<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\TopAccessPoint;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get high wired bandwidth usage Access Points: GET /network-monitoring/v1/top-aps-by-wired-usage.
 *
 * Query parameters: site-id, site-name, start-at, end-at.
 */
class GetTopAccessPointsByWiredUsageRequest extends ListRequest
{
    protected ?string $dto = TopAccessPoint::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    public ?int $maxLimit = 25;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/top-aps-by-wired-usage';
    }
}
