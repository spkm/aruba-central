<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Lacp;

use spkm\ArubaCentral\Central\Data\Config\ArubaLacpLacpSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read existing configuration at the system level: GET /network-config/v1alpha1/lacp.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadLacpRequest extends ItemRequest
{
    protected ?string $dto = ArubaLacpLacpSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/lacp';
    }
}
