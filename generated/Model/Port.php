<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class Port
{
    /**
     * Host IP address that the container's port is mapped to.
     *
     * @var string|null
     */
    protected $iP;
    /**
     * Port on the container.
     *
     * @var int|null
     */
    protected $privatePort;
    /**
     * Port exposed on the host.
     *
     * @var int|null
     */
    protected $publicPort;
    /**
     * @var string|null
     */
    protected $type;

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function getIP(): ?string
    {
        return $this->iP;
    }

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function setIP(?string $iP): self
    {
        $this->iP = $iP;

        return $this;
    }

    /**
     * Port on the container.
     */
    public function getPrivatePort(): ?int
    {
        return $this->privatePort;
    }

    /**
     * Port on the container.
     */
    public function setPrivatePort(?int $privatePort): self
    {
        $this->privatePort = $privatePort;

        return $this;
    }

    /**
     * Port exposed on the host.
     */
    public function getPublicPort(): ?int
    {
        return $this->publicPort;
    }

    /**
     * Port exposed on the host.
     */
    public function setPublicPort(?int $publicPort): self
    {
        $this->publicPort = $publicPort;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
