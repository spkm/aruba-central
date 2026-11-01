<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\LicenseStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Customer level device license status.: GET /presence/v3/license.
 */
class GetPaLicenseStatusRequest extends ItemRequest
{
    protected ?string $dto = LicenseStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/presence/v3/license';
    }
}
