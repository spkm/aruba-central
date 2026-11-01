<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpCxResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get CX Switch Http test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/http/async-operations/{task-id}.
 */
class GetCxHttpResultRequest extends ItemRequest
{
    protected ?string $dto = HttpCxResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/http/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
