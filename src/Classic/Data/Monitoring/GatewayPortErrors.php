<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayPortErrors record.
 */
readonly class GatewayPortErrors extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?float $out_collision = null,
        public ?float $in_crc = null,
        public ?float $err_frames = null,
        /** Timestamp of the sample */
        public ?int $timestamp = null,
    ) {}
}
