<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PingApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP Ping test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/ping/async-operations/{task-id}.
 */
class GetApPingResultRequest extends ItemRequest
{
    protected ?string $dto = PingApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/ping/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
