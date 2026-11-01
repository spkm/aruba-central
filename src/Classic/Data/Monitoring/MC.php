<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A MC record.
 */
readonly class MC extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     */
    public function __construct(
        /** Serial number */
        public ?string $serial = null,
        /** Device Name */
        public ?string $name = null,
        /** MAC address */
        public ?string $macaddr = null,
        /** Group name which device belongs to */
        public ?string $group_name = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** IP address */
        public ?string $ip_address = null,
        /** Model number */
        public ?string $model = null,
        /** Firmware version */
        public ?string $firmware_version = null,
        /** Device Role */
        public ?string $role = null,
        /** Number of APs connected */
        public ?int $ap_count = null,
        /** Device usage */
        public ?string $usage = null,
        /** list labels assigned */
        public ?array $labels = null,
        /** site assigned */
        public ?string $site = null,
        /** EST enrollment status of virtual gateway */
        public ?string $est_status = null,
        /** EST expiry time of virtual gateway */
        public ?string $est_cert_expiry_time = null,
        /** Bandwidth limit of virtual gateway */
        public ?int $vgw_sys_bw_limit = null,
        /** Bandwidth usage of virtual gateway */
        public ?int $vgw_sys_bw_usage = null,
    ) {}
}
