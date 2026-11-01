<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwFramesTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway port frames trend: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayFramesTrendRequest extends ItemRequest
{
    protected ?string $dto = GwFramesTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $portNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/ports/'.rawurlencode((string) $this->portNumber).'/frames-trends';
    }
}
