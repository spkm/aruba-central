<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayUplinkDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of gateway uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}.
 *
 * Query options: start-at, end-at.
 */
class GetGatewayWanInterfaceDetailRequest extends ItemRequest
{
    protected ?string $dto = GatewayUplinkDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $linkTag, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/uplinks/'.rawurlencode((string) $this->linkTag);
    }
}
