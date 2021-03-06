<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class Address
{
    /**
     * IP address.
     *
     * @var string|null
     */
    protected $addr;
    /**
     * Mask length of the IP address.
     *
     * @var int|null
     */
    protected $prefixLen;

    /**
     * IP address.
     */
    public function getAddr(): ?string
    {
        return $this->addr;
    }

    /**
     * IP address.
     */
    public function setAddr(?string $addr): self
    {
        $this->addr = $addr;

        return $this;
    }

    /**
     * Mask length of the IP address.
     */
    public function getPrefixLen(): ?int
    {
        return $this->prefixLen;
    }

    /**
     * Mask length of the IP address.
     */
    public function setPrefixLen(?int $prefixLen): self
    {
        $this->prefixLen = $prefixLen;

        return $this;
    }
}
