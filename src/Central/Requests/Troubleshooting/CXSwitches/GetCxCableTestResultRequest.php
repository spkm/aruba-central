<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\CableTestCxResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get CX Switch Cable Test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/cableTest/async-operations/{task-id}.
 */
class GetCxCableTestResultRequest extends ItemRequest
{
    protected ?string $dto = CableTestCxResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/cableTest/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
