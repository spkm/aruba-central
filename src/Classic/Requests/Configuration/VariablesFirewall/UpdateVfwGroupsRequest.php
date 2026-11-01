<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add groups to Variables Firewall whitelist.: POST /configuration/v1/variables_firewall/groups.
 *
 * Body: groups.
 */
class UpdateVfwGroupsRequest extends WriteRequest
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
        return '/configuration/v1/variables_firewall/groups';
    }
}
