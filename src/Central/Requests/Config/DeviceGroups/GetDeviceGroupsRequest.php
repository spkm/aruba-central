<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DeviceGroups;

use spkm\ArubaCentral\Central\Data\Config\DeviceGroup;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get device-groups: GET /network-config/v1/device-groups.
 *
 * Query parameters: filter, sort.
 */
class GetDeviceGroupsRequest extends ListRequest
{
    protected ?string $dto = DeviceGroup::class;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1/device-groups';
    }
}
