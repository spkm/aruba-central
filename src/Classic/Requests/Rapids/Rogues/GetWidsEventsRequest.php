<?php

namespace spkm\ArubaCentral\Classic\Requests\Rapids\Rogues;

use spkm\ArubaCentral\Classic\Data\Rapids\WidsEvent;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * WIDS Events: GET /rapids/v1/wids/events.
 *
 * Query parameters: group, label, site, start, end, sort, swarm_id, from_timestamp, to_timestamp.
 */
class GetWidsEventsRequest extends ListRequest
{
    protected ?string $dto = WidsEvent::class;

    public string $resultKey = 'wids_aps_info_list';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/rapids/v1/wids/events';
    }
}
