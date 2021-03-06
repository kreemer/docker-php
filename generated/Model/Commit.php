<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class Commit
{
    /**
     * Actual commit ID of external tool.
     *
     * @var string|null
     */
    protected $iD;
    /**
     * Commit ID of external tool expected by dockerd as set at build time.
     *
     * @var string|null
     */
    protected $expected;

    /**
     * Actual commit ID of external tool.
     */
    public function getID(): ?string
    {
        return $this->iD;
    }

    /**
     * Actual commit ID of external tool.
     */
    public function setID(?string $iD): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * Commit ID of external tool expected by dockerd as set at build time.
     */
    public function getExpected(): ?string
    {
        return $this->expected;
    }

    /**
     * Commit ID of external tool expected by dockerd as set at build time.
     */
    public function setExpected(?string $expected): self
    {
        $this->expected = $expected;

        return $this;
    }
}
