<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class VolumesCreatePostBody
{
    /**
     * The new volume's name. If not specified, Docker generates a name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Name of the volume driver to use.
     *
     * @var string|null
     */
    protected $driver = 'local';
    /**
     * A mapping of driver options and values. These options are.
     *
     * @var string[]|null
     */
    protected $driverOpts;
    /**
     * User-defined key/value metadata.
     *
     * @var string[]|null
     */
    protected $labels;

    /**
     * The new volume's name. If not specified, Docker generates a name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The new volume's name. If not specified, Docker generates a name.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Name of the volume driver to use.
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * Name of the volume driver to use.
     */
    public function setDriver(?string $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * A mapping of driver options and values. These options are.
     *
     * @return string[]|null
     */
    public function getDriverOpts(): ?iterable
    {
        return $this->driverOpts;
    }

    /**
     * A mapping of driver options and values. These options are.
     *
     * @param string[]|null $driverOpts
     */
    public function setDriverOpts(?iterable $driverOpts): self
    {
        $this->driverOpts = $driverOpts;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return string[]|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param string[]|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->labels = $labels;

        return $this;
    }
}