<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteHppcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AOS-S Switch Traceroute test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/traceroute/async-operations/{task-id}.
 */
class GetPvosTracerouteResultRequest extends ItemRequest
{
    protected ?string $dto = TracerouteHppcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/traceroute/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
