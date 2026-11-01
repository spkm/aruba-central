<?php

namespace spkm\ArubaCentral\Classic\Data\Licensing;

use spkm\ArubaCentral\Data\Data;

/**
 * A LicenseAvailableAgainstDevices record.
 */
readonly class LicenseAvailableAgainstDevices extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** If value is True, license tokens are sufficient to enable autolicensing for the services. */
        public ?bool $service_name = null,
    ) {}
}
