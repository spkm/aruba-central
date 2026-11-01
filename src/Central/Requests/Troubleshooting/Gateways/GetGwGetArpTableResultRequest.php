<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableMcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Gateway Get Arp Table test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/getArpTable/async-operations/{task-id}.
 */
class GetGwGetArpTableResultRequest extends ItemRequest
{
    protected ?string $dto = GetArpTableMcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/getArpTable/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
