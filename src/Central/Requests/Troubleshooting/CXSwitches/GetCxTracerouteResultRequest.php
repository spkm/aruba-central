<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteCxResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get CX Switch Traceroute test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/traceroute/async-operations/{task-id}.
 */
class GetCxTracerouteResultRequest extends ItemRequest
{
    protected ?string $dto = TracerouteCxResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/traceroute/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
