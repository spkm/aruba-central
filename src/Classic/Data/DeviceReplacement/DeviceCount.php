<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceReplacement;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceCount record.
 */
readonly class DeviceCount extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Begin time of request */
        public ?string $begin_time = null,
        /** End time of request */
        public ?string $end_time = null,
        /** Number of devices in replacement */
        public ?int $result = null,
        /** Status of request */
        public ?string $status = null,
    ) {}
}
