<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Port Bounce test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/portBounce/async-operations/{task-id}.
 */
class GetGwPortBounceResultRequest extends ItemRequest
{
    protected ?string $dto = PortBounceMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/portBounce/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
