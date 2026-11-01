<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceHppcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AOS-S Switch Poe Bounce test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/poeBounce/async-operations/{task-id}.
 */
class GetPvosPoeBounceResultRequest extends ItemRequest
{
    protected ?string $dto = PoeBounceHppcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/poeBounce/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
