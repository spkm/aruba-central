<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\NslookupApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP Nslookup test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/nslookup/async-operations/{task-id}.
 */
class GetApNslookupResultRequest extends ItemRequest
{
    protected ?string $dto = NslookupApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/nslookup/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
