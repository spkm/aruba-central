<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A EventV2 record.
 */
readonly class EventV2 extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     * @param  array<mixed>|null  $sites
     */
    public function __construct(
        /** Event BSSID */
        public ?string $bssid = null,
        /** Event client MAC */
        public ?string $client_mac = null,
        /** Event description */
        public ?string $description = null,
        /** Event device MAC */
        public ?string $device_mac = null,
        /** Event device serial */
        public ?string $device_serial = null,
        /** Event device type */
        public ?string $device_type = null,
        /** Event type */
        public ?string $event_type = null,
        /** Event UUID */
        public ?string $event_uuid = null,
        /** Event group name */
        public ?string $group_name = null,
        /** Event host name */
        public ?string $hostname = null,
        /** List of labels */
        public ?array $labels = null,
        /** Event Number */
        public ?float $number = null,
        /** List of sites */
        public ?array $sites = null,
        /** When the event occured. The value is epoch seconds */
        public ?float $timestamp = null,
    ) {}
}
