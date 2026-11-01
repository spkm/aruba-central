<?php

namespace spkm\ArubaCentral\Classic\Data\Rapids;

use spkm\ArubaCentral\Data\Data;

/**
 * A NeighborAp record.
 */
readonly class NeighborAp extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Containment status of Rogue AP */
        public ?string $containment_status = null,
        /** Monitored AP classification */
        public ?string $classification = null,
        /** The reason for the classification change One of: Device, Rule, Manual, Unknown. */
        public ?string $classification_method = null,
        /** Customer ID / Tenant ID */
        public ?string $cust_id = null,
        /** Encryption used by this SSID One of: WPA, OPEN, WEP, Unknown. */
        public ?string $encryption = null,
        /** AP that first detected the Rogue (AP Serial) */
        public ?string $first_det_device = null,
        /** AP Name that first detected the Rogue */
        public ?string $first_det_device_name = null,
        /** Timestamp at which rogue AP was first seen */
        public ?string $first_seen = null,
        /** Group name of the last detecting AP */
        public ?string $group_name = null,
        /** Rogue Wireless AP MAC address */
        public ?string $id = null,
        /** Ethernet MAC address */
        public ?string $lan_mac = null,
        /** AP that detected the rogue AP */
        public ?string $last_det_device = null,
        /** AP name that detected the rogue AP */
        public ?string $last_det_device_name = null,
        /** Timestamp at which rogue AP was Last seen */
        public ?string $last_seen = null,
        /** Mac Vendor of Rogue AP */
        public ?string $mac_vendor = null,
        /** Name of the Rogue AP */
        public ?string $name = null,
        /** Rogue Ap Signal Strength */
        public ?int $signal = null,
        /** SSID that Rogue AP advertises */
        public ?string $ssid = null,
    ) {}
}
