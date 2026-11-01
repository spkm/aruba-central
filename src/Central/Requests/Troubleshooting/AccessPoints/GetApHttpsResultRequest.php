<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpsApResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP HTTPS test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/https/async-operations/{task-id}.
 */
class GetApHttpsResultRequest extends ItemRequest
{
    protected ?string $dto = HttpsApResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/https/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
