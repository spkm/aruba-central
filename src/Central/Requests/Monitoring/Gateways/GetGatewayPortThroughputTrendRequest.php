<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwInterfaceThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway port throughput trend: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/throughput-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayPortThroughputTrendRequest extends ItemRequest
{
    protected ?string $dto = GwInterfaceThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $portNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/ports/'.rawurlencode((string) $this->portNumber).'/throughput-trends';
    }
}
