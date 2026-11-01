<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Devices;

use spkm\ArubaCentral\Central\Data\Monitoring\Device;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of devices: GET /network-monitoring/v1/devices.
 *
 * Query parameters: filter, sort.
 */
class GetDevicesRequest extends ListRequest
{
    protected ?string $dto = Device::class;

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
        return '/network-monitoring/v1/devices';
    }
}
