<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\RfEvents;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get RF events of a specific radio MAC: GET /telemetry/v1/rf_events/{radio_mac}.
 *
 * Query parameters: tenant_id.
 */
class GetRfEventsByRadioMacRequest extends ListRequest
{
    protected ?string $dto = RfEvents::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $radioMac, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/rf_events/'.rawurlencode((string) $this->radioMac);
    }
}
