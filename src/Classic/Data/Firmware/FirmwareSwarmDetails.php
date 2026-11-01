<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A FirmwareSwarmDetails record.
 */
readonly class FirmwareSwarmDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $aps
     * @param  array<mixed>|null  $status
     */
    public function __construct(
        /** Details of aps for specific swarm A list of AP records. */
        public ?array $aps = null,
        /** Swarm ID */
        public ?string $swarm_id = null,
        /** Name of swarm */
        public ?string $swarm_name = null,
        /** Count of APs for specific swarm */
        public ?int $aps_count = null,
        /** Up or Down */
        public ?string $device_status = null,
        /** Recommended firmware version */
        public ?string $recommended = null,
        /** Firmware version of swarm */
        public ?string $firmware_version = null,
        /** Whether firmware upgrade is required */
        public ?bool $upgrade_required = null,
        /** Keys: state, reason, firmware_scheduled_at. */
        public ?array $status = null,
    ) {}
}
