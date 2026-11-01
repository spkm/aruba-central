<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update admin SSH details of a group.: PUT /configuration/v1/aos_switch/system/groups/{group_name}.
 *
 * Body: username, password.
 */
class SetGroupAdminRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/aos_switch/system/groups/'.rawurlencode((string) $this->groupName);
    }
}
