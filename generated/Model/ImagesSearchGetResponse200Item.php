<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class ImagesSearchGetResponse200Item
{
    /**
     * @var string|null
     */
    protected $description;
    /**
     * @var bool|null
     */
    protected $isOfficial;
    /**
     * @var bool|null
     */
    protected $isAutomated;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var int|null
     */
    protected $starCount;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsOfficial(): ?bool
    {
        return $this->isOfficial;
    }

    public function setIsOfficial(?bool $isOfficial): self
    {
        $this->isOfficial = $isOfficial;

        return $this;
    }

    public function getIsAutomated(): ?bool
    {
        return $this->isAutomated;
    }

    public function setIsAutomated(?bool $isAutomated): self
    {
        $this->isAutomated = $isAutomated;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStarCount(): ?int
    {
        return $this->starCount;
    }

    public function setStarCount(?int $starCount): self
    {
        $this->starCount = $starCount;

        return $this;
    }
}
