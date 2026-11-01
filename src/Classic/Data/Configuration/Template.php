<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A Template record.
 */
readonly class Template extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $name = null,
        public ?string $group = null,
        /** One of: IAP, ArubaSwitch, MobilityController. */
        public ?string $device_type = null,
        public ?string $version = null,
        public ?string $model = null,
        /** MD5SUM hash value for template text data. */
        public ?string $template_hash = null,
    ) {}
}
