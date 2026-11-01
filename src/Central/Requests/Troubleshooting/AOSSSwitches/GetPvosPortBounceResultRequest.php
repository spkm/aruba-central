<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceHppcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AOS-S Switch Port Bounce test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/portBounce/async-operations/{task-id}.
 */
class GetPvosPortBounceResultRequest extends ItemRequest
{
    protected ?string $dto = PortBounceHppcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/portBounce/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
