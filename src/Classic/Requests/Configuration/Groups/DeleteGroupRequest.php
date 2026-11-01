<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete existing group.: DELETE /configuration/v1/groups/{group}.
 */
class DeleteGroupRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group);
    }
}
