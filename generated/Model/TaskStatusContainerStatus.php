<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class TaskStatusContainerStatus
{
    /**
     * @var string|null
     */
    protected $containerID;
    /**
     * @var int|null
     */
    protected $pID;
    /**
     * @var int|null
     */
    protected $exitCode;

    public function getContainerID(): ?string
    {
        return $this->containerID;
    }

    public function setContainerID(?string $containerID): self
    {
        $this->containerID = $containerID;

        return $this;
    }

    public function getPID(): ?int
    {
        return $this->pID;
    }

    public function setPID(?int $pID): self
    {
        $this->pID = $pID;

        return $this;
    }

    public function getExitCode(): ?int
    {
        return $this->exitCode;
    }

    public function setExitCode(?int $exitCode): self
    {
        $this->exitCode = $exitCode;

        return $this;
    }
}
