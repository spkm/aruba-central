<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointTunnelDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get an Access Point Tunnel details: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}.
 */
class GetAccessPointTunnelDetailRequest extends ItemRequest
{
    protected ?string $dto = AccessPointTunnelDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $tunnelId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/tunnels/'.rawurlencode((string) $this->tunnelId);
    }
}
