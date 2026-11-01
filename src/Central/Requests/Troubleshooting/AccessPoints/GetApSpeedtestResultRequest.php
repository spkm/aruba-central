<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\SpeedtestApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP Speedtest status and results: GET /network-troubleshooting/v1/aps/{serial-number}/speedtest/async-operations/{task-id}.
 */
class GetApSpeedtestResultRequest extends ItemRequest
{
    protected ?string $dto = SpeedtestApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/speedtest/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
