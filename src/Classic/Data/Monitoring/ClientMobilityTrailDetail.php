<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClientMobilityTrailDetail record.
 */
readonly class ClientMobilityTrailDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** AP name */
        public ?string $ap_name = null,
        /** Transition time */
        public ?int $ts = null,
        /** AP Serial number */
        public ?string $ap_serial = null,
        /** AP name */
        public ?string $previous_ap_name = null,
        /** Roaming type One of: 11r, okc, 802.11. */
        public ?string $roaming_type = null,
        /** Roaming latency in milliseconds */
        public ?int $latency = null,
        /** Client radio band */
        public ?string $band = null,
        /** Client's ESSID */
        public ?string $network = null,
        /** BSSID mac address */
        public ?string $bssid = null,
        /** RSSI */
        public ?int $rssi = null,
        /** Radio channel */
        public ?string $channel = null,
    ) {}
}
