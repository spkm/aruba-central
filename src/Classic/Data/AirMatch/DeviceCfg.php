<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceCfg record.
 */
readonly class DeviceCfg extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $opmodes
     * @param  array<mixed>|null  $radios
     */
    public function __construct(
        /** Device MAC Address */
        public ?string $device_mac = null,
        /** Static Channel */
        public ?int $static_chan = null,
        /** Static Power */
        public ?int $static_pwr = null,
        public ?array $opmodes = null,
        /** Keys: 2.4GHz, 5GHz. */
        public ?array $radios = null,
    ) {}
}
