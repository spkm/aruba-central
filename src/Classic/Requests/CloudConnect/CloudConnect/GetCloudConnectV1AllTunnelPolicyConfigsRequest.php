<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectAllTunnelConfigs;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the list of all Tunnel Policy Configurations: GET /cloud-connect/v1/all-tunnel-policy-configs.
 */
class GetCloudConnectV1AllTunnelPolicyConfigsRequest extends ItemRequest
{
    protected ?string $dto = ArubaCloudVpnConnectAllTunnelConfigs::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/all-tunnel-policy-configs';
    }
}
