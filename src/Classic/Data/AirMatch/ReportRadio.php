<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A ReportRadio record.
 */
readonly class ReportRadio extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $static_chan
     */
    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** MAC address of Radio */
        public ?string $radio_mac = null,
        /** Channel frequency number for AP */
        public ?int $channel = null,
        /** Secondary Channel Number for AP */
        public ?int $sec_freq = null,
        /** Frequency Band */
        public ?string $band = null,
        /** Bandwidth assigned to Radio */
        public ?string $bandwidth = null,
        /** Amount of Effective Radiated Power by Radio */
        public ?int $eirp = null,
        /** MAC address of AP where radio is located */
        public ?string $ap_eth_mac = null,
        /** AP Name where radio is located */
        public ?string $ap_name = null,
        /** AP Model name where radio is located */
        public ?string $ap_model = null,
        /** If the channel is static */
        public ?bool $is_static_chan = null,
        /** If the channel is static */
        public ?bool $is_static_eirp = null,
        /** If Reporting Radio is active */
        public ?bool $is_active = null,
        /** Channel Reason */
        public ?string $chan_reason = null,
        /** Channel Timestamp */
        public ?int $chan_timestamp = null,
        /** Effective Radiated Power Reason */
        public ?string $eirp_reason = null,
        /** Effective Radiated Power Timestamp */
        public ?int $eirp_timestamp = null,
        /** Keys: channel, bandwidth, sec_freq, chan_reason. */
        public ?array $static_chan = null,
        /** Advanced Power Control */
        public ?bool $adv_pwr_ctrl = null,
        /** Effective Radiated Power in dbm */
        public ?float $eirp_dbm = null,
        /** Type of Mode */
        public ?string $probe_type = null,
        public ?string $switch_ip = null,
        /** Uptime for AP */
        public ?int $ap_uptime = null,
        /** If the interface is down */
        public ?bool $interface_down = null,
        /** Number of Chains */
        public ?int $num_chains = null,
    ) {}
}
