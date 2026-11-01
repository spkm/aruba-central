<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Variables;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create template variables for all devices.: POST /configuration/v1/devices/template_variables.
 *
 * Query options: format.
 *
 * Body: variables.
 */
class CreateAllDevicesTemplateVariablesRequest extends WriteRequest
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
        return '/configuration/v1/devices/template_variables';
    }
}
