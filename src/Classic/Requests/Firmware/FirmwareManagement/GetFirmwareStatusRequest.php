<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\CommandStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Firmware Status: GET /firmware/v1/status.
 *
 * Query options: swarm_id, serial.
 */
class GetFirmwareStatusRequest extends ItemRequest
{
    protected ?string $dto = CommandStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/status';
    }
}
