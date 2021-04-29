<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class HostConfigLogConfig
{
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var string[]|null
     */
    protected $config;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getConfig(): ?iterable
    {
        return $this->config;
    }

    /**
     * @param string[]|null $config
     */
    public function setConfig(?iterable $config): self
    {
        $this->config = $config;

        return $this;
    }
}
