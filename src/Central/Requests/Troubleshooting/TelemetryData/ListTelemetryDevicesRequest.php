<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData;

use spkm\ArubaCentral\Central\Data\Troubleshooting\DeviceInfoRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List device information.: GET /network-troubleshooting/v1/telemetry-devices.
 *
 * Query parameters (* required): serial-number*, orig-data.
 */
class ListTelemetryDevicesRequest extends ListRequest
{
    protected ?string $dto = DeviceInfoRespItem::class;

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
        return '/network-troubleshooting/v1/telemetry-devices';
    }
}
