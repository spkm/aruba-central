<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\DeviceNeighborsRootItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get lldp device neighbor info for CX switch: GET /monitoring/v1/cx_switches/{serial}/neighbors.
 */
class GetCxSwitchNeighborsRequest extends ListRequest
{
    protected ?string $dto = DeviceNeighborsRootItem::class;

    public string $resultKey = 'data';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/cx_switches/'.rawurlencode((string) $this->serial).'/neighbors';
    }
}
