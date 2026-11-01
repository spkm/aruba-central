<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\CableTestHppcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AOS-S Switch Cable Test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/cableTest/async-operations/{task-id}.
 */
class GetPvosCableTestResultRequest extends ItemRequest
{
    protected ?string $dto = CableTestHppcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/cableTest/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
