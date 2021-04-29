<?php

declare(strict_types=1);

namespace Docker\Tests;

use Docker\API\Model\ImageSummary;
use Docker\Docker;
use Docker\Stream\CreateImageStream;

class TestCase extends \PHPUnit\Framework\TestCase
{
    private static ?Docker $docker = null;

    public static function getDocker(): Docker
    {
        if (null === self::$docker) {
            self::$docker = Docker::create();
        }

        return self::$docker;
    }


    protected function getLocalImageByName(string $imageName): ?ImageSummary
    {
        $images = self::getDocker()->imageList();
        foreach ($images as $image) {
            if (false !== in_array($imageName, $image->getRepoTags())) {
                return $image;
            }
        }

        return null;
    }

    /**
     * @param string $imageName Image Name with tag (eg: busybox:latest)
     */
    protected function pullImage(string $imageName)
    {
        /** @var CreateImageStream $response */
        $response = self::getDocker()->imageCreate('', [ 'fromImage' => $imageName ]);
        $response->wait();

        self::assertNotNull($this->getLocalImageByName($imageName), 'Image \"' . $imageName . '\" should be pulled, but was not found locally');
    }
}
