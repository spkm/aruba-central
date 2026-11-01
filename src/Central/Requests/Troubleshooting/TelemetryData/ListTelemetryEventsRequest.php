<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData;

use spkm\ArubaCentral\Central\Data\Troubleshooting\EventRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get device events data.: GET /network-troubleshooting/v1/telemetry-events.
 *
 * Query parameters (* required): serial-number*, event-type, start-at, end-at, orig-data.
 */
class ListTelemetryEventsRequest extends ListRequest
{
    protected ?string $dto = EventRespItem::class;

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
        return '/network-troubleshooting/v1/telemetry-events';
    }
}
