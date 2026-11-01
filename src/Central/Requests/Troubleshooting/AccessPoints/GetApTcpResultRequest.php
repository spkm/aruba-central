<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TcpApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP TCP test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/tcp/async-operations/{task-id}.
 */
class GetApTcpResultRequest extends ItemRequest
{
    protected ?string $dto = TcpApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/tcp/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
