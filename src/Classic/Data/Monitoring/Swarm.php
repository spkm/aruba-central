<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Swarm record.
 */
readonly class Swarm extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Swarm ID */
        public ?string $swarm_id = null,
        /** Swarm Name */
        public ?string $name = null,
        /** Group Name to which the Swarm belongs to */
        public ?string $group_name = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** Public Ip address of the Swarm */
        public ?string $public_ip_address = null,
        /** Ip address of the Swarm */
        public ?string $ip_address = null,
        /** Firmware version of the Swarm */
        public ?string $firmware_Version = null,
    ) {}
}
