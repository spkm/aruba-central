<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update guest portal profile: PUT /guest/v1/portals/{portal_id}.
 *
 * Body: name, auth_type, username_password_enabled, registration_enabled, verify_registration, bypass_cna_policy, cna_policy, register_accept_email, register_accept_phone, free_wifi_duration, self_reg_account_unlimited, self_reg_account_expire_days.
 */
class UpdateApiPortalRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $portalId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId);
    }
}
