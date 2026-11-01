<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\PriorityRfEvents;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all radar and noise RF events of a tenant: GET /telemetry/v1/priority_rf_events_all.
 *
 * Query parameters: tenant_id.
 */
class GetAllPriorityRfEventsRequest extends ListRequest
{
    protected ?string $dto = PriorityRfEvents::class;

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
        return '/telemetry/v1/priority_rf_events_all';
    }
}
