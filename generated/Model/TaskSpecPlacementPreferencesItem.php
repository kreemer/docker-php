<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class TaskSpecPlacementPreferencesItem
{
    /**
     * @var TaskSpecPlacementPreferencesItemSpread|null
     */
    protected $spread;

    public function getSpread(): ?TaskSpecPlacementPreferencesItemSpread
    {
        return $this->spread;
    }

    public function setSpread(?TaskSpecPlacementPreferencesItemSpread $spread): self
    {
        $this->spread = $spread;

        return $this;
    }
}
