<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Central\Data\Services\LaTrendsResponseForAPI;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get all the trends of a client for a tenant or a site for a given time range.: GET /network-services/v1/location-analytics/trends.
 *
 * Query options: site-id.
 */
class GetLaTrendsForAPIRequest extends ItemRequest
{
    protected ?string $dto = LaTrendsResponseForAPI::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/location-analytics/trends';
    }
}
