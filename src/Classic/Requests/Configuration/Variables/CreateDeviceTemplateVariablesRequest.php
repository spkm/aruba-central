<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Variables;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create template variables for a device.: POST /configuration/v1/devices/{device_serial}/template_variables.
 *
 * Body: total, variables.
 */
class CreateDeviceTemplateVariablesRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/'.rawurlencode((string) $this->deviceSerial).'/template_variables';
    }
}
