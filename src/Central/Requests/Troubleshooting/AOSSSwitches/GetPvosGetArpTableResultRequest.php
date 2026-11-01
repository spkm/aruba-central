<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableHppcResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AOS-S Switch Get Arp Table test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/getArpTable/async-operations/{task-id}.
 */
class GetPvosGetArpTableResultRequest extends ItemRequest
{
    protected ?string $dto = GetArpTableHppcResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/getArpTable/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
