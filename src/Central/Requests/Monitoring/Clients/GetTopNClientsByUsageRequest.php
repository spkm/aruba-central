<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Clients;

use spkm\ArubaCentral\Central\Data\Monitoring\GetTopNClientsByUsageItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get Top N Clients By Usage: GET /network-monitoring/v1/clients-topn-usage.
 *
 * Query parameters: site-id, site-name, start-at, end-at, serial-number.
 */
class GetTopNClientsByUsageRequest extends ListRequest
{
    protected ?string $dto = GetTopNClientsByUsageItem::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clients-topn-usage';
    }
}
