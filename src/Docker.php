<?php

declare(strict_types=1);

namespace Docker;

use Docker\API\Client;
use Docker\API\Model\AuthConfig;
use Docker\API\Model\ExecIdStartPostBody;
use Docker\Endpoint\ContainerAttach;
use Docker\Endpoint\ContainerAttachWebsocket;
use Docker\Endpoint\ContainerLogs;
use Docker\Endpoint\ExecStart;
use Docker\Endpoint\ImageBuild;
use Docker\Endpoint\ImageCreate;
use Docker\Endpoint\ImagePush;
use Docker\Endpoint\SystemEvents;
use Http\Client\Common\Plugin;

/**
 * Docker\Docker.
 */
class Docker extends Client
{
    /**
     * {@inheritDoc}
     *
     * @param array<string, mixed> $queryParameters
     */
    public function containerAttach($id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerAttach($id, $queryParameters), $fetch);
    }

    /**
     * {@inheritdoc}
     *
     * @param array<string, mixed> $queryParameters
     */
    public function containerAttachWebsocket($id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerAttachWebsocket($id, $queryParameters), $fetch);
    }

    /**
     * {@inheritdoc}
     *
     * @param array<string, mixed> $queryParameters
     */
    public function containerLogs($id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerLogs($id, $queryParameters), $fetch);
    }

    /**
     * {@inheritdoc}
     */
    public function execStart(string $id, ExecIdStartPostBody $execStartConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ExecStart($id, $execStartConfig), $fetch);
    }

    /**
     * {@inheritdoc}
     *
     * @param array<string, mixed> $queryParameters
     * @param array<string, mixed> $headerParameters
     */
    public function imageBuild($inputStream, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageBuild($inputStream, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * {@inheritdoc}
     *
     * @param array<string, mixed> $queryParameters
     * @param array<string, mixed> $headerParameters
     */
    public function imageCreate(string $inputImage, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageCreate($inputImage, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * {@inheritdoc}
     *
     * @param array<string, mixed> $queryParameters
     * @param array<string, mixed> $headerParameters
     */
    public function imagePush($name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        if (isset($headerParameters['X-Registry-Auth']) && $headerParameters['X-Registry-Auth'] instanceof AuthConfig) {
            $headerParameters['X-Registry-Auth'] = \base64_encode($this->serializer->serialize($headerParameters['X-Registry-Auth'], 'json'));
        }

        return $this->executeEndpoint(new ImagePush($name, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * {@inheritdoc}
     *
     * @param array<string, mixed> $queryParameters
     */
    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemEvents($queryParameters), $fetch);
    }

    /**
     * @param null          $httpClient
     * @param array<Plugin> $additionalPlugins Parameter will be ignored
     */
    public static function create($httpClient = null, $additionalPlugins = []): Docker
    {
        if (null === $httpClient) {
            $httpClient = DockerClientFactory::createFromEnv();
        }

        return parent::create($httpClient);
    }
}
