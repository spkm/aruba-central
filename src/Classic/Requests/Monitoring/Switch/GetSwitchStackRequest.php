<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\StackDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Switch Stack Details: GET /monitoring/v1/switch_stacks/{stack_id}.
 */
class GetSwitchStackRequest extends ItemRequest
{
    protected ?string $dto = StackDetail::class;

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
