<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Errors record.
 */
readonly class Errors extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Sample timestamp in epoch */
        public ?float $timestamp = null,
        /** In errors for the timestamp */
        public ?float $in_errors_pkts = null,
        /** Out errors for the timestamp */
        public ?float $out_errors_pkts = null,
        /** In discards for the timestamp */
        public ?float $in_discards_pkts = null,
        /** Out discards for the timestamp */
        public ?float $out_discards_pkts = null,
        /** In runts for the timestamp */
        public ?float $in_runt_pkts = null,
        /** In giants for the timestamp */
        public ?float $in_giant_pkts = null,
        /** In crc for the timestamp */
        public ?float $in_crc_pkts = null,
        /** In throttle for the timestamp */
        public ?float $in_throttle_pkts = null,
        /** Out collision for the timestamp */
        public ?float $out_collision_pkts = null,
        /** Out late collision for the timestamp */
        public ?float $out_late_collision_pkts = null,
        /** Out multiple collision for the timestamp */
        public ?float $out_multiple_collision_pkts = null,
        /** Out throttle for the timestamp */
        public ?float $out_throttle_pkts = null,
        /** Out deferred for the timestamp */
        public ?float $out_deferred_pkts = null,
    ) {}
}
