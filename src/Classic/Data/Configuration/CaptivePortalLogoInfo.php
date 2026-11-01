<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A CaptivePortalLogoInfo record.
 */
readonly class CaptivePortalLogoInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $cp_logo_filename = null,
        public ?string $cp_logo_md5_checksum = null,
    ) {}
}
