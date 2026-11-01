<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectTunnelPolicyConfig;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the Tunnel Policy Configuration for policy_name: GET /cloud-connect/v1/tunnel-policy-config/{policy_name}.
 */
class GetCloudConnectV1TunnelPolicyConfigPolicyNameRequest extends ItemRequest
{
    protected ?string $dto = ArubaCloudVpnConnectTunnelPolicyConfig::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $policyName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/tunnel-policy-config/'.rawurlencode((string) $this->policyName);
    }
}
