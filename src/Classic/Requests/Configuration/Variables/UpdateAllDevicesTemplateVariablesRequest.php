<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Variables;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update template variables for all devices (Only JSON Payload).: PATCH /configuration/v1/devices/template_variables.
 *
 * Body: variables.
 */
class UpdateAllDevicesTemplateVariablesRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
        return '/configuration/v1/devices/template_variables';
    }
}
