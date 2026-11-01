<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Tunnel Policy with name as policy_name: DELETE /cloud-connect/v1/tunnel-policy-config/{policy_name}.
 */
class DeleteCloudConnectV1TunnelPolicyConfigPolicyNameRequest extends DeleteRequest
{
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
