<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A NetworkRecord record.
 */
readonly class NetworkRecord extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Network Name */
        public ?string $essid = null,
        /** WLAN security type(Open, WPA2-Personal, etc) */
        public ?string $security = null,
        /** WLAN type(Guest, Employee, etc) */
        public ?string $type = null,
        /** Clients connected to SSID. Valid only when calculate_client_count is specified */
        public ?int $client_count = null,
    ) {}
}
