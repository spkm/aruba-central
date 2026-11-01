<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\AP;

use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * AP Bandwidth Usage: GET /monitoring/v3/aps/bandwidth_usage.
 *
 * Query parameters: group, swarm_id, label, site, serial, cluster_id, interval, band, radio_number, ethernet_interface_index, network, from_timestamp, to_timestamp.
 */
class GetApsBandwidthUsageRequest extends ListRequest
{
    protected ?string $dto = Bandwidth::class;

    public string $resultKey = 'samples';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v3/aps/bandwidth_usage';
    }
}
