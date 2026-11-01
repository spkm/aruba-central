<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Devices;

use spkm\ArubaCentral\Central\Data\Monitoring\AsyncNotesResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get notes async operation status and results: GET /network-monitoring/v1/device-notes-async-operations/{id}.
 */
class GetDeviceNotesOperationRequest extends ItemRequest
{
    protected ?string $dto = AsyncNotesResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/device-notes-async-operations/'.rawurlencode((string) $this->id);
    }
}
