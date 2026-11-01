<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get 'show' commands status/result (CX): GET /network-troubleshooting/v1/cx/{serial-number}/showCommands/async-operations/{task-id}.
 */
class GetCxShowCommandsResultRequest extends ItemRequest
{
    protected ?string $dto = ShowCommandResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/showCommands/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
