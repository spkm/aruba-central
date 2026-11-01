<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update registered client name.: PATCH /cloudauth/api/v3/client/mac/registration/{mac_address}.
 *
 * Body: client_name.
 */
class EditRegistrationRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macAddress, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/client/mac/registration/'.rawurlencode((string) $this->macAddress);
    }
}
