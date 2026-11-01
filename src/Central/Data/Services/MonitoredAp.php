<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * An access point WIDS has seen and classified: rogue, interfering, neighbour or valid.
 */
readonly class MonitoredAp extends Data
{
    /**
     * @param  array<mixed>|null  $portData
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** When the record was created. */
        public ?CarbonImmutable $createdAt = null,
        /** BSSID of the monitored AP. */
        public ?string $bssid = null,
        /** Name of the monitored AP. */
        public ?string $name = null,
        /** SSID it advertises. */
        public ?string $ssid = null,
        /** Identifier of the site. */
        public ?string $siteId = null,
        /** Name of the site. */
        public ?string $siteName = null,
        /** Classification, such as ROGUE, INTERFERING, NEIGHBOR or VALID. */
        public ?string $classification = null,
        /** How it was classified. */
        public ?string $classificationMethod = null,
        /** The rule that classified it. */
        public ?string $classificationRule = null,
        /** Containment status. */
        public ?string $containmentStatus = null,
        /** Encryption in use. */
        public ?string $encryption = null,
        /** Signal strength. */
        public ?string $signal = null,
        /** Vendor of the MAC address. */
        public ?string $macVendor = null,
        /** When it was first seen. */
        public ?CarbonImmutable $firstSeen = null,
        /** Serial number of the device that first detected it. */
        public ?string $firstDetDeviceSerial = null,
        /** Name of that device. */
        public ?string $firstDetDeviceName = null,
        /** When it was last seen. */
        public ?CarbonImmutable $lastSeen = null,
        /** Serial number of the device that last detected it. */
        public ?string $lastDetDeviceSerial = null,
        /** Name of that device. */
        public ?string $lastDetDeviceName = null,
        /** Wired port details, when it was seen on the wire. */
        public ?array $portData = null,
    ) {}
}
