<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Configure policy to allow wireless network access for users.: PUT /cloudAuth/api/v1/user_policy.
 *
 * Body: default_role, google_workspace, microsoft_azure, okta, organization_name, rules, wlan_network.
 */
class EditUserPolicyRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
        return '/cloudAuth/api/v1/user_policy';
    }
}
