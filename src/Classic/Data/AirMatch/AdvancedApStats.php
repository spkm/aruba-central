<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A AdvancedApStats record.
 */
readonly class AdvancedApStats extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['_2_4ghz' => '2.4ghz', '_5ghz' => '5ghz'];

    /**
     * @param  array<mixed>|null  $_2_4ghz
     * @param  array<mixed>|null  $_5ghz
     */
    public function __construct(
        public ?array $_2_4ghz = null,
        public ?array $_5ghz = null,
        /** Number of Unique APs */
        public ?int $Number_of_APs = null,
    ) {}
}
