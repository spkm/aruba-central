<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TelemetryDataRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get device telemetry data.: GET /network-troubleshooting/v1/telemetry-metrics.
 *
 * Query parameters (* required): dataset*, serial-number*, telemetry-path*, orig-data.
 */
class ListTelemetryMetricsRequest extends ListRequest
{
    protected ?string $dto = TelemetryDataRespItem::class;

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
        return '/network-troubleshooting/v1/telemetry-metrics';
    }
}
