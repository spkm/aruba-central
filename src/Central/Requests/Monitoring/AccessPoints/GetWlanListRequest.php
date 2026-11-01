<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\WlanInfoWithClientCount;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of WLANs: GET /network-monitoring/v1/wlans.
 *
 * Query parameters: site-id, serial-number, filter, sort.
 */
class GetWlanListRequest extends ListRequest
{
    protected ?string $dto = WlanInfoWithClientCount::class;

    public string $paging = self::CURSOR;

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
        return '/network-monitoring/v1/wlans';
    }
}
