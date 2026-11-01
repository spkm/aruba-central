<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\ClientPolicy;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy\EditClientPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy\GetClientPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy\ResetClientPolicyRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Client Policy API, from Aruba::cloudAuth()->clientPolicy().
 *
 * @extends BaseResource<Data>
 */
class ClientPolicyResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Reset Client Policy.: PUT /cloudauth/api/v3/client_policy/reset.
     *
     * @param  array<string, mixed>  $options
     */
    public function resetClientPolicy(string $deleteMAC, array $options = []): mixed
    {
        return $this->fetch(new ResetClientPolicyRequest($deleteMAC, $options));
    }

    /**
     * Configure or update network access policy for registered clients.: PUT /cloudAuth/api/v1/client_policy.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateClientPolicy(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new EditClientPolicyRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Fetch network access policy for registered clients.: GET /cloudAuth/api/v1/client_policy.
     *
     * @param  array<string, mixed>  $options
     */
    public function clientPolicy(array $options = []): ?ClientPolicy
    {
        return $this->fetch(new GetClientPolicyRequest($options));
    }
}
