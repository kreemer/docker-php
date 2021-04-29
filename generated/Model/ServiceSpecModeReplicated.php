<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class ServiceSpecModeReplicated
{
    /**
     * @var int|null
     */
    protected $replicas;

    public function getReplicas(): ?int
    {
        return $this->replicas;
    }

    public function setReplicas(?int $replicas): self
    {
        $this->replicas = $replicas;

        return $this;
    }
}