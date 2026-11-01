<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A AdvancedStatNbr record.
 */
readonly class AdvancedStatNbr extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['_2ghz' => '2ghz', '_5ghz' => '5ghz'];

    /**
     * @param  array<mixed>|null  $_2ghz
     * @param  array<mixed>|null  $_5ghz
     */
    public function __construct(
        /** Keys: Number of Radios Reporting Neighbors, Number of Interfering Neighbors, Average Number of Friend Neighbors, Average Number of Interfering Neighbors. */
        public ?array $_2ghz = null,
        /** Keys: Number of Radios Reporting Neighbors, Number of Interfering Neighbors, Average Number of Friend Neighbors, Average Number of Interfering Neighbors. */
        public ?array $_5ghz = null,
    ) {}
}
