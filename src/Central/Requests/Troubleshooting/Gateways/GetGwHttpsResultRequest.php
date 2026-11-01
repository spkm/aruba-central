<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpsMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Https test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/https/async-operations/{task-id}.
 */
class GetGwHttpsResultRequest extends ItemRequest
{
    protected ?string $dto = HttpsMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/https/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
