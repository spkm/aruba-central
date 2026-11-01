<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ServiceConfig;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns Device (AP) Running Configuration: GET /network-services/v1/airmatch-service-config.
 */
class GetServiceConfigRequest extends ItemRequest
{
    protected ?string $dto = ServiceConfig::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-service-config';
    }
}
