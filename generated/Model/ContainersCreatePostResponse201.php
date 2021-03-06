<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class ContainersCreatePostResponse201
{
    /**
     * The ID of the created container.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Warnings encountered when creating the container.
     *
     * @var string[]|null
     */
    protected $warnings;

    /**
     * The ID of the created container.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of the created container.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Warnings encountered when creating the container.
     *
     * @return string[]|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * Warnings encountered when creating the container.
     *
     * @param string[]|null $warnings
     */
    public function setWarnings(?array $warnings): self
    {
        $this->warnings = $warnings;

        return $this;
    }
}
