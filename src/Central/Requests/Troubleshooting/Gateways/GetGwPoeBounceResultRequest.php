<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Poe Bounce test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/poeBounce/async-operations/{task-id}.
 */
class GetGwPoeBounceResultRequest extends ItemRequest
{
    protected ?string $dto = PoeBounceMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/poeBounce/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
