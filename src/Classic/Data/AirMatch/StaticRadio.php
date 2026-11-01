<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A StaticRadio record.
 */
readonly class StaticRadio extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $static_chan
     */
    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** Radio MAC Address */
        public ?string $radio_mac = null,
        /** Channel Number */
        public ?int $channel = null,
        /** Secondary Frequency */
        public ?int $sec_freq = null,
        /** Channel Band */
        public ?string $band = null,
        /** Channel Bandwidth */
        public ?string $bandwidth = null,
        /** Effective Radiated Power */
        public ?int $eirp = null,
        /** AP Ethernet MAC Address */
        public ?string $ap_eth_mac = null,
        /** AP Name */
        public ?string $ap_name = null,
        /** AP Model Name */
        public ?string $ap_model = null,
        /** If the channel is static */
        public ?bool $is_static_chan = null,
        /** If the effective radiated Power is static */
        public ?bool $is_static_eirp = null,
        /** If the radio channel is active */
        public ?bool $is_active = null,
        /** Keys: channel, bandwidth, sec_freq, chan_reason. */
        public ?array $static_chan = null,
    ) {}
}
