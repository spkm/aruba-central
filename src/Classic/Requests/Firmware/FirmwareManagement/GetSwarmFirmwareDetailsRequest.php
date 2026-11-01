<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareSwarmDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Firmware Details of Swarm: GET /firmware/v1/swarms/{swarm_id}.
 */
class GetSwarmFirmwareDetailsRequest extends ItemRequest
{
    protected ?string $dto = FirmwareSwarmDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $swarmId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/swarms/'.rawurlencode((string) $this->swarmId);
    }
}
