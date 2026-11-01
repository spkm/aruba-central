<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A GuestAccess record.
 */
readonly class GuestAccess extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Num of guest sessions */
        public ?int $guests = null,
        /** Num of guest ssids */
        public ?int $num_unique_ssids = null,
        /** Average duration of a guest session */
        public ?string $average_duration = null,
        /** Max num of concurrent connections */
        public ?int $max_concurrent_guests = null,
    ) {}
}
