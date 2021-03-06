<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class TaskSpecContainerSpecPrivilegesCredentialSpec
{
    /**
     * Load credential spec from a Swarm Config with the given ID.
    <p><br /></p>


    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     *
     * @var string|null
     */
    protected $config;
    /**
     * Load credential spec from this file. The file is read by.
    <p><br /></p>

    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     *
     * @var string|null
     */
    protected $file;
    /**
     * Load credential spec from this value in the Windows.
    <p><br /></p>


    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     *
     * @var string|null
     */
    protected $registry;

    /**
     * Load credential spec from a Swarm Config with the given ID.
    <p><br /></p>


    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
    > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function getConfig(): ?string
    {
        return $this->config;
    }

    /**
     * Load credential spec from a Swarm Config with the given ID.
    <p><br /></p>


    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
    > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function setConfig(?string $config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Load credential spec from this file. The file is read by.
    <p><br /></p>

    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
    > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Load credential spec from this file. The file is read by.
    <p><br /></p>

    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
    > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Load credential spec from this value in the Windows.
    <p><br /></p>


    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
    > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function getRegistry(): ?string
    {
        return $this->registry;
    }

    /**
     * Load credential spec from this value in the Windows.
    <p><br /></p>


    > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
    > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function setRegistry(?string $registry): self
    {
        $this->registry = $registry;

        return $this;
    }
}
