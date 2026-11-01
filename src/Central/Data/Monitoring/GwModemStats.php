<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GwModemStats record.
 */
readonly class GwModemStats extends Data
{
    public function __construct(
        /** Absolute Radio Frequency Channel Number for 3G networks. */
        public ?int $arfcn3g = null,
        /** Absolute Radio Frequency Channel Number for LTE networks. */
        public ?int $arfcnLte = null,
        /** Channel Quality Indicator representing the quality of the wireless channel. */
        public ?int $cqi = null,
        /** It indicates the start date of the monthly billing cycle. */
        public ?int $dataBilling = null,
        /** Data limit for the modem connection. */
        public ?string $dataLimit = null,
        /** Data usage for the modem connection. */
        public ?string $dataUsage = null,
        /** Received Signal Code Power for 3G networks. */
        public ?string $rscp3g = null,
        /** Reference Signal Received Power for LTE networks. */
        public ?string $rsrpLte = null,
        /** Reference Signal Received Quality for LTE networks. */
        public ?string $rsrq = null,
        /** Received Signal Strength Indicator for the modem connection. */
        public ?string $rssi = null,
        /** Signal-to-Interference-plus-Noise Ratio for the modem connection. */
        public ?int $signalStrength = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
