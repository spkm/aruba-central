<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A BandwidthList record.
 */
readonly class BandwidthList extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $samples
     */
    public function __construct(
        /** Number of samples */
        public ?int $count = null,
        /** Sample interval. It can be one of "5minutes", "1hour", "1day" and "1week" */
        public ?string $interval = null,
        /** List of data samples A list of Bandwidth records. */
        public ?array $samples = null,
    ) {}
}
