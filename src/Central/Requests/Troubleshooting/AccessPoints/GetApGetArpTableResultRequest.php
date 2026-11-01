<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP Get Arp Table test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/getArpTable/async-operations/{task-id}.
 */
class GetApGetArpTableResultRequest extends ItemRequest
{
    protected ?string $dto = GetArpTableApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/getArpTable/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
