<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete an installer: DELETE /v1/installer.
 */
class DeleteInstallerRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/installer';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['id' => $this->id, ...parent::defaultQuery()];
    }
}
