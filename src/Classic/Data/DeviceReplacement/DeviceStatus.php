<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceReplacement;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceStatus record.
 */
readonly class DeviceStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Time at which the API request was made */
        public ?string $begin_time = null,
        /** Time at which API request completed */
        public ?string $end_time = null,
        /** Keys: completion_status, configuration_assignment_info, configuration_assignment_requested_time, configuration_assignment_updated_time, customer_id, device_connection_status, device_mode, device_type, faulty_device_firmware_version, faulty_device_mac…. */
        public ?array $result = null,
        /** Status of the request */
        public ?string $status = null,
    ) {}
}
