<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create new group with specified properties.: POST /configuration/v3/groups.
 *
 * Body: group, group_attributes.
 */
class CreateGroupV3Request extends WriteRequest
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
        return '/configuration/v3/groups';
    }
}
