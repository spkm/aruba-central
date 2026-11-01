<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\AaaApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP AAA test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/aaa/async-operations/{task-id}.
 */
class GetApAaaResultRequest extends ItemRequest
{
    protected ?string $dto = AaaApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/aaa/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
