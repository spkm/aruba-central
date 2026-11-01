<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\Timeseries;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Return the time-series from device: GET /v1/devices/{deviceId}/timeseries.
 *
 * Query parameters (* required): aggregation, collectorId, endTime*, metrics, reporter, startTime*.
 */
class GetDeviceTimeseriesMetricsRequest extends ListRequest
{
    protected ?string $dto = Timeseries::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $deviceId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices/'.rawurlencode((string) $this->deviceId).'/timeseries';
    }
}
