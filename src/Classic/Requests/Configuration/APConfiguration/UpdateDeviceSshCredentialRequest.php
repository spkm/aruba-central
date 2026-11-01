<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update ssh credential in device level.: POST /configuration/v1/device/ssh_credential/{serial_number_or_guid}.
 *
 * Body: username, password.
 */
class UpdateDeviceSshCredentialRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumberOrGuid, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/device/ssh_credential/'.rawurlencode((string) $this->serialNumberOrGuid);
    }
}
