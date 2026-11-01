<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\WANCompressionStats;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway Uplink WAN compression stats: GET /monitoring/v1/gateways/{serial}/uplinks/wan_compression_stats.
 *
 * Query parameters: uplink_id, interval, from_timestamp, to_timestamp.
 */
class GetGatewayUplinksWanCompressionUsageRequest extends ListRequest
{
    protected ?string $dto = WANCompressionStats::class;

    public string $resultKey = 'samples';

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
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/uplinks/wan_compression_stats';
    }
}
