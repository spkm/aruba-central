<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add variables to Variables Firewall whitelist.: POST /configuration/v1/variables_firewall/variables.
 *
 * Body: variables.
 */
class UpdateVfwVariablesRequest extends WriteRequest
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
        return '/configuration/v1/variables_firewall/variables';
    }
}
