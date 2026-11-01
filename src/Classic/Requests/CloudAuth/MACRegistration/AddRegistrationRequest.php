<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add mac registration.: POST /cloudauth/api/v3/client/mac/registration.
 *
 * Body: auto_created, client_name, mac_address.
 */
class AddRegistrationRequest extends WriteRequest
{
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
        return '/cloudauth/api/v3/client/mac/registration';
    }
}
