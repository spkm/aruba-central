<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous;

use spkm\ArubaCentral\Classic\Data\AirMatch\ServiceCfg;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns device (AP) running configuration: GET /receiver/v1/service_config.
 *
 * Query options: tenant_id.
 */
class GetServiceConfigRequest extends ItemRequest
{
    protected ?string $dto = ServiceCfg::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/receiver/v1/service_config';
    }
}
