<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Devices;

use spkm\ArubaCentral\Central\Data\Monitoring\DeviceInventoryItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a device inventory list: GET /network-monitoring/v1/device-inventory.
 *
 * Query parameters: filter, sort, site-assigned.
 */
class GetDeviceInventoryRequest extends ListRequest
{
    protected ?string $dto = DeviceInventoryItem::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/device-inventory';
    }
}
