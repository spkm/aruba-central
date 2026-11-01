<?php

namespace spkm\ArubaCentral\Classic\Data\Msp;

use spkm\ArubaCentral\Data\Data;

/**
 * A CountryCode record.
 */
readonly class CountryCode extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** contains a country name and alpha-2 code */
        public ?string $country_name = null,
    ) {}
}
