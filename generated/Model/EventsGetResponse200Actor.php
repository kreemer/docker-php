<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class EventsGetResponse200Actor
{
    /**
     * The ID of the object emitting the event.
     *
     * @var string|null
     */
    protected $iD;
    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @var string[]|null
     */
    protected $attributes;

    /**
     * The ID of the object emitting the event.
     */
    public function getID(): ?string
    {
        return $this->iD;
    }

    /**
     * The ID of the object emitting the event.
     */
    public function setID(?string $iD): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @return string[]|null
     */
    public function getAttributes(): ?iterable
    {
        return $this->attributes;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @param string[]|null $attributes
     */
    public function setAttributes(?iterable $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }
}