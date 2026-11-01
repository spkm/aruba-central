<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A MobilityDetails record.
 */
readonly class MobilityDetails extends Data
{
    public function __construct(
        /** Specifies the transition time of the client. */
        public ?string $occurredAt = null,
        /** Specifies the roaming latency in milliseconds. */
        public ?string $roamTime = null,
        /** Specifies the network identifier. */
        public ?string $wlanName = null,
        /** Specifies the AP name from which the client roamed. */
        public ?string $sourceAp = null,
        /** Specifies the AP name to which the client roamed. */
        public ?string $destinationAp = null,
        /** Specifies the channel from which the client roamed. */
        public ?string $fromChannel = null,
        /** Specifies the channel to which the client roamed. */
        public ?string $toChannel = null,
        /** Specifies the BSSID MAC address from which the client roamed. */
        public ?string $fromBssid = null,
        /** Specifies the BSSID MAC address to which the client roamed. */
        public ?string $toBssid = null,
        /** Specifies the RSSI value after the client roamed. */
        public ?string $rssi = null,
        /** Specifies the radio band to which the client roamed. */
        public ?string $radioBand = null,
        /** Specifies the type of roam that has happened. One of: 11r, okc, 802.11. */
        public ?string $roamProtocol = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
    ) {}
}
