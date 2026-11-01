<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A WANCompressionStats record.
 */
readonly class WANCompressionStats extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Sample timestamp in epoch */
        public ?float $timestamp = null,
        /** Uncompressed data bytes for the timestamp */
        public ?float $uncompressed_data_bytes = null,
        /** Compressed data bytes for the timestamp */
        public ?float $compressed_data_bytes = null,
        /** Saved data bytes for the timestamp */
        public ?float $saved_data_bytes = null,
    ) {}
}
