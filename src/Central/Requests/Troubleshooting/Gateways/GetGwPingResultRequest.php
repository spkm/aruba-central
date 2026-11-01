<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PingMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Ping test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/ping/async-operations/{task-id}.
 */
class GetGwPingResultRequest extends ItemRequest
{
    protected ?string $dto = PingMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/ping/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
