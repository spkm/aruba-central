<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A AdvancedStatRadio record.
 */
readonly class AdvancedStatRadio extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['_2_4ghz' => '2.4ghz', '_5ghz' => '5ghz'];

    /**
     * @param  array<mixed>|null  $_2_4ghz
     * @param  array<mixed>|null  $_5ghz
     */
    public function __construct(
        /** Keys: Active Radios, Inactive Radios, Radios, Radios With Up-To-Date Info, Radios with Stale Info. */
        public ?array $_2_4ghz = null,
        /** Keys: Active Radios, Inactive Radios, Radios, Radios With Up-To-Date Info, Radios with Stale Info. */
        public ?array $_5ghz = null,
    ) {}
}
