<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\VPN;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Monitoring\BandwidthList;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Swarm VPN stats: POST /monitoring/v3/vpn/usage.
 *
 * Body: swarm_id, tunnel_index, tunnel_name, from_timestamp, to_timestamp.
 */
class GetVpnUsageRequest extends WriteRequest
{
    protected ?string $dto = BandwidthList::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v3/vpn/usage';
    }
}
