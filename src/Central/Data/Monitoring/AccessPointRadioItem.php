<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointRadioItem record.
 */
readonly class AccessPointRadioItem extends Data
{
    public function __construct(
        public ?string $macAddress = null,
        public ?string $health = null,
        public ?string $status = null,
        public ?string $band = null,
        public ?string $bandRange = null,
        public ?string $channel = null,
        public ?string $bandwidth = null,
        public ?string $mode = null,
        public ?int $radioNumber = null,
        public ?int $power = null,
        public ?string $siteId = null,
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
        public ?int $clientCount = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
