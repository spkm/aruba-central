<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP Traceroute test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/traceroute/async-operations/{task-id}.
 */
class GetApTracerouteResultRequest extends ItemRequest
{
    protected ?string $dto = TracerouteApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/traceroute/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
