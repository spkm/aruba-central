<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Clone and create new group.: POST /configuration/v2/groups/clone.
 *
 * Body: group, clone_group, upgrade_architecture.
 */
class CloneGroupRequest extends WriteRequest
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
        return '/configuration/v2/groups/clone';
    }
}
