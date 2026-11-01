<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Configure or update network access policy for registered clients.: PUT /cloudAuth/api/v1/client_policy.
 *
 * Body: allow_all_mac_auth, default_role, dpp_wlan_network, rules.
 */
class EditClientPolicyRequest extends WriteRequest
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
        return '/cloudAuth/api/v1/client_policy';
    }
}
