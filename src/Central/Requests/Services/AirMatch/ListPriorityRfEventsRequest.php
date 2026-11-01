<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\PrioRfEvents;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all radar and noise RF events of a tenant: GET /network-services/v1/airmatch-priority-rf-events.
 *
 * Query parameters: start-at, end-at.
 */
class ListPriorityRfEventsRequest extends ListRequest
{
    protected ?string $dto = PrioRfEvents::class;

    public ?int $maxLimit = 500;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-priority-rf-events';
    }
}
