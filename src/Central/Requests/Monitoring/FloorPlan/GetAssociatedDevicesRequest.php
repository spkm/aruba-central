<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Retrieves assigned devices: GET /network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned.
 *
 * Query parameters (* required): filter*.
 */
class GetAssociatedDevicesRequest extends ListRequest
{
    public string $paging = self::CURSOR;

    public ?int $maxLimit = 2147483647;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $siteId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/network-devices-assigned';
    }
}
