<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A VSXInfo record.
 */
readonly class VSXInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Keys: device_role, device_peer_role, isl_port, peer_isl_port, keep_alive_peer_ip, keep_alive_src_ip, last_synced, device_mac, peer_device_mac, config_sync…. */
        public ?array $data = null,
    ) {}
}
