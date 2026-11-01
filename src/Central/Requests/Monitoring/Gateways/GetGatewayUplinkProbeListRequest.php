<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List gateway uplink probes: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes.
 *
 * Query parameters: filter, site-id.
 */
class GetGatewayUplinkProbeListRequest extends ListRequest
{
    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, protected string $linkTag, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/uplinks/'.rawurlencode((string) $this->linkTag).'/probes';
    }
}
