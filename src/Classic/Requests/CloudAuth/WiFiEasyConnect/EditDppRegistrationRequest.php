<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update registered client with bootstrapping key.: PUT /cloudAuth/api/v1/dpp_registration/{id}.
 *
 * Body: id, uri.
 */
class EditDppRegistrationRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v1/dpp_registration/'.rawurlencode((string) $this->id);
    }
}
