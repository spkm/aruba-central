<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Events;

use spkm\ArubaCentral\Classic\Data\Monitoring\EventV2;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Events: GET /monitoring/v2/events.
 *
 * Query parameters: group, swarm_id, label, from_timestamp, to_timestamp, macaddr, bssid, device_mac, hostname, device_type, sort, site, serial, level, event_description, event_type, fields, calculate_total.
 */
class GetEventsRequest extends ListRequest
{
    protected ?string $dto = EventV2::class;

    public string $resultKey = 'events';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/events';
    }
}
