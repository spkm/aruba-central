<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Classic\Data\AirMatch\DeviceCfg;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Returns all device (AP) running configuration for a customer: GET /feasibility/v1/device_config.
 *
 * Query parameters: tenant_id.
 */
class GetAllDeviceConfigRequest extends ListRequest
{
    protected ?string $dto = DeviceCfg::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/feasibility/v1/device_config';
    }
}
