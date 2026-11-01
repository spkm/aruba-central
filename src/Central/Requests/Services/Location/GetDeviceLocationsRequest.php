<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Central\Data\Services\DeviceLocationSummary;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List devices with location information: GET /network-services/v1/sites/{site-id}/device-locations.
 *
 * Query parameters: filter, with-location.
 */
class GetDeviceLocationsRequest extends ListRequest
{
    protected ?string $dto = DeviceLocationSummary::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $siteId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/sites/'.rawurlencode((string) $this->siteId).'/device-locations';
    }
}
