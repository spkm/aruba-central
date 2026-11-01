<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP HTTP test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/http/async-operations/{task-id}.
 */
class GetApHttpResultRequest extends ItemRequest
{
    protected ?string $dto = HttpApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/http/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
