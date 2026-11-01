<?php

namespace spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth;

use spkm\ArubaCentral\Central\Data\Config\GetConfigHealthDevicesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Returns summary of configuration health for devices.: GET /network-config/v1alpha1/config-health/devices.
 *
 * Query parameters: sort, filter, search.
 */
class GetConfigHealthDevicesRequest extends ListRequest
{
    protected ?string $dto = GetConfigHealthDevicesItem::class;

    public string $resultKey = 'devices';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/config-health/devices';
    }
}
