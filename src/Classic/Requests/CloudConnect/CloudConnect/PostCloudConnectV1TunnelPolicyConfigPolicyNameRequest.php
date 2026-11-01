<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Creates a new Tunnel Policy with name as policy_name: POST /cloud-connect/v1/tunnel-policy-config/{policy_name}.
 *
 * Body: ike_policy, tunnel_params, ipsec_policy.
 */
class PostCloudConnectV1TunnelPolicyConfigPolicyNameRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $policyName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/tunnel-policy-config/'.rawurlencode((string) $this->policyName);
    }
}
