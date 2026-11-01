<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\Timeseries;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Return a time-series device count by collectorId: GET /v1/devices/timeseries/count_device.
 *
 * Query parameters (* required): aggregation, collectorId, endTime*, startTime*, type.
 */
class GetDeviceCountByCollectorIdRequest extends ListRequest
{
    protected ?string $dto = Timeseries::class;

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
        return '/v1/devices/timeseries/count_device';
    }
}
