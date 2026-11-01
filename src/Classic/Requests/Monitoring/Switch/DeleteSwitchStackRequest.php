<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Switch Stack: DELETE /monitoring/v1/switch_stacks/{stack_id}.
 */
class DeleteSwitchStackRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $stackId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/switch_stacks/'.rawurlencode((string) $this->stackId);
    }
}
