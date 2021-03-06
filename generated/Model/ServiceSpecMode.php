<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class ServiceSpecMode
{
    /**
     * @var ServiceSpecModeReplicated|null
     */
    protected $replicated;
    /**
     * @var mixed|null
     */
    protected $global;
    /**
     * The mode used for services with a finite number of tasks that run.
     *
     * @var ServiceSpecModeReplicatedJob|null
     */
    protected $replicatedJob;
    /**
     * The mode used for services which run a task to the completed state.
     *
     * @var mixed|null
     */
    protected $globalJob;

    public function getReplicated(): ?ServiceSpecModeReplicated
    {
        return $this->replicated;
    }

    public function setReplicated(?ServiceSpecModeReplicated $replicated): self
    {
        $this->replicated = $replicated;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGlobal()
    {
        return $this->global;
    }

    /**
     * @param mixed $global
     */
    public function setGlobal($global): self
    {
        $this->global = $global;

        return $this;
    }

    /**
     * The mode used for services with a finite number of tasks that run.
    to a completed state.
     */
    public function getReplicatedJob(): ?ServiceSpecModeReplicatedJob
    {
        return $this->replicatedJob;
    }

    /**
     * The mode used for services with a finite number of tasks that run.
    to a completed state.
     */
    public function setReplicatedJob(?ServiceSpecModeReplicatedJob $replicatedJob): self
    {
        $this->replicatedJob = $replicatedJob;

        return $this;
    }

    /**
     * The mode used for services which run a task to the completed state.
     *
     * @return mixed
     */
    public function getGlobalJob()
    {
        return $this->globalJob;
    }

    /**
     * The mode used for services which run a task to the completed state.
     *
     * @param mixed $globalJob
     */
    public function setGlobalJob($globalJob): self
    {
        $this->globalJob = $globalJob;

        return $this;
    }
}
