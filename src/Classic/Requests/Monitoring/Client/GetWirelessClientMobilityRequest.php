<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\ClientMobilityTrailDetail;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Wireless Client Mobility Trail: GET /monitoring/v1/clients/wireless/{macaddr}/mobility_trail.
 *
 * Query parameters: calculate_total, from_timestamp, to_timestamp.
 */
class GetWirelessClientMobilityRequest extends ListRequest
{
    protected ?string $dto = ClientMobilityTrailDetail::class;

    public string $resultKey = 'trails';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $macaddr, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/clients/wireless/'.rawurlencode((string) $this->macaddr).'/mobility_trail';
    }
}
