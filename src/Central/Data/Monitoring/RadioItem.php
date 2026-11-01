<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A RadioItem record.
 */
readonly class RadioItem extends Data
{
    public function __construct(
        public ?string $serialNumber = null,
        public ?string $deviceName = null,
        public ?string $macAddress = null,
        public ?string $status = null,
        public ?string $band = null,
        public ?string $bandRange = null,
        public ?string $channel = null,
        public ?string $bandwidth = null,
        public ?string $mode = null,
        public ?int $radioNumber = null,
        public ?int $power = null,
        public ?string $siteId = null,
        public ?string $siteName = null,
        public ?string $channelUtilization = null,
        public ?string $nonWifiInterference = null,
        public ?string $txUtilization = null,
        public ?string $rxUtilization = null,
        public ?string $noiseFloor = null,
        public ?string $drops = null,
        public ?string $retries = null,
        public ?string $channelQuality = null,
        public ?int $channelChangeCount = null,
        public ?int $powerChangeCount = null,
        public ?string $antenna = null,
        public ?string $spatialStream = null,
        public ?string $radioType = null,
        public ?int $clientCount = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
