<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class Health
{
    /**
     * Status is one of `none`, `starting`, `healthy` or `unhealthy`.

     *
     * @var string|null
     */
    protected $status;
    /**
     * FailingStreak is the number of consecutive failures.
     *
     * @var int|null
     */
    protected $failingStreak;
    /**
     * Log contains the last few results (oldest first).
     *
     * @var HealthcheckResult[]|null
     */
    protected $log;

    /**
     * Status is one of `none`, `starting`, `healthy` or `unhealthy`.

    - "unhealthy" Unhealthy indicates that the container has a problem
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Status is one of `none`, `starting`, `healthy` or `unhealthy`.

    - "unhealthy" Unhealthy indicates that the container has a problem
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * FailingStreak is the number of consecutive failures.
     */
    public function getFailingStreak(): ?int
    {
        return $this->failingStreak;
    }

    /**
     * FailingStreak is the number of consecutive failures.
     */
    public function setFailingStreak(?int $failingStreak): self
    {
        $this->failingStreak = $failingStreak;

        return $this;
    }

    /**
     * Log contains the last few results (oldest first).
     *
     * @return HealthcheckResult[]|null
     */
    public function getLog(): ?array
    {
        return $this->log;
    }

    /**
     * Log contains the last few results (oldest first).
     *
     * @param HealthcheckResult[]|null $log
     */
    public function setLog(?array $log): self
    {
        $this->log = $log;

        return $this;
    }
}
