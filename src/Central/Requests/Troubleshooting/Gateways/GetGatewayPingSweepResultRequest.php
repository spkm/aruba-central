<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\GatewayPingSweepResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get PingSweep status/result (Gateway): GET /network-troubleshooting/v1/gateways/{serial-number}/pingSweep/async-operations/{task-id}.
 */
class GetGatewayPingSweepResultRequest extends ItemRequest
{
    protected ?string $dto = GatewayPingSweepResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/pingSweep/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
