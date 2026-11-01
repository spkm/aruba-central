<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceCxResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get CX Switch Port Bounce test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/portBounce/async-operations/{task-id}.
 */
class GetCxPortBounceResultRequest extends ItemRequest
{
    protected ?string $dto = PortBounceCxResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/portBounce/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
