<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get locations of Wi-Fi clients: GET /network-services/v1/wifi-clients-locations.
 *
 * Query parameters: filter, start-at, latest-location-per-client, latest-connected-client-mac.
 */
class ListClientLocationsForAPIRequest extends ListRequest
{
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
        return '/network-services/v1/wifi-clients-locations';
    }
}
