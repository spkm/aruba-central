<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Http test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/http/async-operations/{task-id}.
 */
class GetGwHttpResultRequest extends ItemRequest
{
    protected ?string $dto = HttpMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/http/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
