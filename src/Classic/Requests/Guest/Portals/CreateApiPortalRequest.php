<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Guest\PortalId;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a new guest portal profile: POST /guest/v1/portals.
 *
 * Body: name, auth_type, username_password_enabled, registration_enabled, verify_registration, bypass_cna_policy, cna_policy, register_accept_email, register_accept_phone, free_wifi_duration, self_reg_account_unlimited, self_reg_account_expire_days.
 */
class CreateApiPortalRequest extends WriteRequest
{
    protected ?string $dto = PortalId::class;

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
        return '/guest/v1/portals';
    }
}
