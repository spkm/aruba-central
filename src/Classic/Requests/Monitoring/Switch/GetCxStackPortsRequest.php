<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\CXStackPortList;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * CX Switch Stack Port Details: GET /monitoring/v1/cx_switch_stacks/{stack_id}/ports.
 */
class GetCxStackPortsRequest extends ItemRequest
{
    protected ?string $dto = CXStackPortList::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $stackId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/cx_switch_stacks/'.rawurlencode((string) $this->stackId).'/ports';
    }
}
