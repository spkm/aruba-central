<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Register a client.: POST /cloudAuth/api/v1/dpp_registration.
 *
 * Body: id, uri.
 */
class AddDppRegistrationRequest extends WriteRequest
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
        return '/cloudAuth/api/v1/dpp_registration';
    }
}
