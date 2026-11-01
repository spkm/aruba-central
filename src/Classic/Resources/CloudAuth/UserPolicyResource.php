<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\UserPolicy;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy\EditUserPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy\GetUserPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy\ResetUserPolicyRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The User Policy API, from Aruba::cloudAuth()->userPolicy().
 *
 * @extends BaseResource<Data>
 */
class UserPolicyResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Reset User Policy.: PUT /cloudauth/api/v3/user_policy/reset.
     *
     * @param  array<string, mixed>  $options
     */
    public function resetUserPolicy(string $deleteMPSK, array $options = []): mixed
    {
        return $this->fetch(new ResetUserPolicyRequest($deleteMPSK, $options));
    }

    /**
     * Configure policy to allow wireless network access for users.: PUT /cloudAuth/api/v1/user_policy.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateUserPolicy(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new EditUserPolicyRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Fetch policy that allows wireless network access for users.: GET /cloudAuth/api/v1/user_policy.
     *
     * @param  array<string, mixed>  $options
     */
    public function userPolicy(array $options = []): ?UserPolicy
    {
        return $this->fetch(new GetUserPolicyRequest($options));
    }
}
