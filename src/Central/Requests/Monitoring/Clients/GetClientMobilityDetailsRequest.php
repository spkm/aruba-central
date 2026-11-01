<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Clients;

use spkm\ArubaCentral\Central\Data\Monitoring\MobilityDetails;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get Wireless Client Mobility Details: GET /network-monitoring/v1/clients/{mac-address}/mobility-trail.
 *
 * Query parameters: site-id, site-name, start-at, end-at, filter, sort.
 */
class GetClientMobilityDetailsRequest extends ListRequest
{
    protected ?string $dto = MobilityDetails::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $macAddress, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clients/'.rawurlencode((string) $this->macAddress).'/mobility-trail';
    }
}
