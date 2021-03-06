<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class PluginSettings
{
    /**
     * @var PluginMount[]|null
     */
    protected $mounts;
    /**
     * @var string[]|null
     */
    protected $env;
    /**
     * @var string[]|null
     */
    protected $args;
    /**
     * @var PluginDevice[]|null
     */
    protected $devices;

    /**
     * @return PluginMount[]|null
     */
    public function getMounts(): ?array
    {
        return $this->mounts;
    }

    /**
     * @param PluginMount[]|null $mounts
     */
    public function setMounts(?array $mounts): self
    {
        $this->mounts = $mounts;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getEnv(): ?array
    {
        return $this->env;
    }

    /**
     * @param string[]|null $env
     */
    public function setEnv(?array $env): self
    {
        $this->env = $env;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getArgs(): ?array
    {
        return $this->args;
    }

    /**
     * @param string[]|null $args
     */
    public function setArgs(?array $args): self
    {
        $this->args = $args;

        return $this;
    }

    /**
     * @return PluginDevice[]|null
     */
    public function getDevices(): ?array
    {
        return $this->devices;
    }

    /**
     * @param PluginDevice[]|null $devices
     */
    public function setDevices(?array $devices): self
    {
        $this->devices = $devices;

        return $this;
    }
}
