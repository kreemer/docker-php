<?php

declare(strict_types=1);

namespace Docker\Endpoint;

use Docker\API\Endpoint\ImageBuild as BaseEndpoint;
use Docker\Stream\BuildStream;
use Docker\Stream\TarStream;
use Jane\OpenApiRuntime\Client\Client;
use Jane\OpenApiRuntime\Client\Exception\InvalidFetchModeException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ImageBuild extends BaseEndpoint
{
    /**
     * @param ?StreamFactoryInterface $streamFactory
     *
     * @return array[]
     */
    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        $body = $this->body;

        if (\is_resource($body)) {
            $body = new TarStream($body);
        }

        return [[], $body];
    }

    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            // @phpstan-ignore-next-line
            return new BuildStream($body, $serializer);
        }

        return parent::transformResponseBody($body, $status, $serializer, $contentType);
    }

    /**
     * @return mixed
     */
    public function parseResponse(ResponseInterface $response, SerializerInterface $serializer, string $fetchMode = Client::FETCH_OBJECT)
    {
        if (Client::FETCH_OBJECT === $fetchMode) {
            if (200 === $response->getStatusCode()) {
                return new BuildStream($response->getBody(), $serializer);
            }

            return $this->transformResponseBody((string) $response->getBody(), $response->getStatusCode(), $serializer, $response->getHeaderLine('Content-Type'));
        }

        if (Client::FETCH_RESPONSE === $fetchMode) {
            return $response;
        }

        throw new InvalidFetchModeException(\sprintf('Fetch mode %s is not supported', $fetchMode));
    }
}
