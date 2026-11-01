<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayVlanDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gateway VLAN detail: GET /network-monitoring/v1/gateways/{serial-number}/vlans/{vlan-id}.
 */
class GetGatewayVlanDetailRequest extends ItemRequest
{
    protected ?string $dto = GatewayVlanDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $vlanId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/vlans/'.rawurlencode((string) $this->vlanId);
    }
}
