<?php

declare(strict_types=1);

namespace Docker\Tests\Resource;

use Docker\API\Model\ContainersCreatePostBody;
use Docker\API\Model\ContainersIdJsonGetResponse200;
use Docker\Docker;
use Docker\Stream\DockerRawStream;
use Docker\Tests\TestCase;

class ContainerResourceTest extends TestCase
{
    /**
     * Return the container manager.
     */
    private function getManager(): Docker
    {
        return self::getDocker();
    }

    public function testDeleteImage(): void
    {
        $this->pullImage('bash:5.1.4');
        $image = $this->getLocalImageByName('bash:5.1.4');
        self::assertNotNull($image, 'Could not find image \"bash:5.1.4\", this leads to other errors in tests');
        self::getDocker()->imageDelete($image->getId());
        self::assertNull($this->getLocalImageByName('bash:5.1.4'));
    }

    public function testInspectRunningImage(): void
    {
        $this->pullImage('busybox:latest');

        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['sh']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));
        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);
        $this->getManager()->containerStart($containerCreateResult->getId());

        $inspect = $this->getManager()->containerInspect($containerCreateResult->getId());
        if (!$inspect instanceof ContainersIdJsonGetResponse200) {
            $this->fail('Could not inspect container with id '.$containerCreateResult->getId());
        }

        $this->assertEquals($containerCreateResult->getId(), $inspect->getId());
        $this->getManager()->containerStop($containerCreateResult->getId());
    }

    public function testInspectRunningImageWithExposedPorts(): void
    {
        $this->pullImage('nginx:latest');

        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('nginx:latest');
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);
        $this->getManager()->containerStart($containerCreateResult->getId());

        $inspect = $this->getManager()->containerInspect($containerCreateResult->getId());
        if (!$inspect instanceof ContainersIdJsonGetResponse200) {
            $this->fail('Could not inspect container with id '.$containerCreateResult->getId());
        }
        $this->assertEquals($containerCreateResult->getId(), $inspect->getId());

        $this->getManager()->containerStop($containerCreateResult->getId());
    }

    public function testAttach(): void
    {
        $this->pullImage('busybox:latest');

        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['echo', '-n', 'output']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);
        /** @var DockerRawStream $dockerRawStream */
        $dockerRawStream = $this->getManager()->containerAttach($containerCreateResult->getId(), [
            'stream' => true,
            'stdout' => true,
        ]);

        $stdoutFull = '';
        $dockerRawStream->onStdout(function ($stdout) use (&$stdoutFull): void {
            $stdoutFull .= $stdout;
        });

        $this->getManager()->containerStart($containerCreateResult->getId());
        $this->getManager()->containerWait($containerCreateResult->getId());

        $dockerRawStream->wait();

        $this->assertSame('output', $stdoutFull);
    }

    public function testAttachWebsocket(): void
    {
        $this->markTestSkipped('Test does not work');

        /*$containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['sh']);
        $containerConfig->setAttachStdin(false);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setAttachStderr(true);
        $containerConfig->setOpenStdin(true);
        $containerConfig->setTty(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);

        $webSocketStream = $this->getManager()->containerAttachWebsocket($containerCreateResult->getId(), [
            'stream' => true,
            'stdout' => true,
            'stderr' => true,
            'stdin' => true,
        ]);

        $this->getManager()->containerStart($containerCreateResult->getId());

        // Read the bash first line
        $this->assertNotFalse($webSocketStream->read());

        // No output after that so it should be false
        $this->assertFalse($webSocketStream->read());

        // Write something to the container
        $webSocketStream->write("echo test\n");

        // Test for echo present (stdin)
        $output = '';

        while (false !== ($data = $webSocketStream->read())) {
            $output .= $data;
        }

        $this->assertStringContainsString('echo', $output);

        // Exit the container
        $webSocketStream->write("exit\n");
        */
    }

    public function testLogs(): void
    {
        $this->pullImage('busybox:latest');

        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['echo', '-n', 'output']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);

        $this->getManager()->containerStart($containerCreateResult->getId());
        $this->getManager()->containerWait($containerCreateResult->getId());

        /** @var DockerRawStream $logsStream */
        $logsStream = $this->getManager()->containerLogs($containerCreateResult->getId(), [
            'stdout' => true,
            'stderr' => true,
        ], Docker::FETCH_OBJECT);

        self::assertInstanceOf(DockerRawStream::class, $logsStream);
    }
}
