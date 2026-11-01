<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\IperfMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Iperf test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/iperf/async-operations/{task-id}.
 */
class GetGwIperfResultRequest extends ItemRequest
{
    protected ?string $dto = IperfMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/iperf/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
