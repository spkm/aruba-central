<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get all installers: GET /v1/installer.
 */
class GetInstallersRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/installer';
    }
}
