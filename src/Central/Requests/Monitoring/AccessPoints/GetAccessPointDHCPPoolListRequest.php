<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointDHCPPoolItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of AP DHCP Pools: GET /network-monitoring/v1/aps/{serial-number}/dhcp-pools.
 *
 * Query parameters: filter, sort.
 */
class GetAccessPointDHCPPoolListRequest extends ListRequest
{
    protected ?string $dto = AccessPointDHCPPoolItem::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/dhcp-pools';
    }
}
