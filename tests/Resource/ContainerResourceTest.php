<?php

declare(strict_types=1);

namespace Docker\Tests\Resource;

use Docker\API\Model\ContainersCreatePostBody;
use Docker\Docker;
use Docker\Stream\AttachWebsocketStream;
use Docker\Stream\DockerRawStream;
use Docker\Tests\TestCase;

class ContainerResourceTest extends TestCase
{
    /**
     * Return the container manager.
     */
    private function getManager()
    {
        return self::getDocker();
    }

    /**
     * Be sure to have image before doing test.
     */
    public static function setUpBeforeClass(): void
    {
        self::getDocker()->imageCreate('', [
            'fromImage' => 'busybox:latest',
        ]);
    }

    public function testAttach(): void
    {
        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['echo', '-n', 'output']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);
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

        return;
        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['sh']);
        $containerConfig->setAttachStdin(false);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setAttachStderr(true);
        $containerConfig->setOpenStdin(true);
        $containerConfig->setTty(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);

        /** @var AttachWebsocketStream $webSocketStream */
        $webSocketStream = $this->getManager()->containerAttachWebsocket($containerCreateResult->getId(), [
            'stream' => true,
            'stdout' => true,
            'stderr' => true,
            'stdin' => true,
        ]);

        var_dump($containerCreateResult->getId());
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
    }

    public function testLogs(): void
    {
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