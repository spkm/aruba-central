<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ConfigId;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns the global configuration ID for the tenant: GET /network-services/v1/airmatch-global-config-id.
 */
class GetGlobalConfigIdRequest extends ItemRequest
{
    protected ?string $dto = ConfigId::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-global-config-id';
    }
}
