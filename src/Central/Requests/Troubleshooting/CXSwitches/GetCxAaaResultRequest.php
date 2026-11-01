<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\AaaCxResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get CX Switch Aaa test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/aaa/async-operations/{task-id}.
 */
class GetCxAaaResultRequest extends ItemRequest
{
    protected ?string $dto = AaaCxResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/aaa/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
