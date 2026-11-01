<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceCxResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get CX Switch Poe Bounce test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/poeBounce/async-operations/{task-id}.
 */
class GetCxPoeBounceResultRequest extends ItemRequest
{
    protected ?string $dto = PoeBounceCxResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/poeBounce/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
