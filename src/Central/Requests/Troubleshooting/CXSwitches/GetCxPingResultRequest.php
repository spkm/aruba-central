<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PingCxResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get CX Switch Ping test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/ping/async-operations/{task-id}.
 */
class GetCxPingResultRequest extends ItemRequest
{
    protected ?string $dto = PingCxResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/ping/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
