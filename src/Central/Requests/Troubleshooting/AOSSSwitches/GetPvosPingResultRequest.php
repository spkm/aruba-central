<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PingHppcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AOS-S Switch Ping test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/ping/async-operations/{task-id}.
 */
class GetPvosPingResultRequest extends ItemRequest
{
    protected ?string $dto = PingHppcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/ping/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
