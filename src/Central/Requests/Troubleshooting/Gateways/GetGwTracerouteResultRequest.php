<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Traceroute test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/traceroute/async-operations/{task-id}.
 */
class GetGwTracerouteResultRequest extends ItemRequest
{
    protected ?string $dto = TracerouteMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/traceroute/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
