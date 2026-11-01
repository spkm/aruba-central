<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A LicenseStatus record.
 */
readonly class LicenseStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** one of the values ['true', 'false'] */
        public ?bool $customer_level = null,
    ) {}
}
