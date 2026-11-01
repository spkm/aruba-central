<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\UserManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\CloudAuth\RevokeCertRes;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Revoke a user's device certificate: POST /cloudauth/api/v3/user/certificate/revocation.
 *
 * Body: issuer_der, serial, subject_der.
 */
class RevokeDeviceCertificateRequest extends WriteRequest
{
    protected ?string $dto = RevokeCertRes::class;

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
        return '/cloudauth/api/v3/user/certificate/revocation';
    }
}
