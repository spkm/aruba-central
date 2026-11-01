<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A GuestReprovision record.
 */
readonly class GuestReprovision extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Status to indicate if guest reprovisioned successfully or not. */
        public ?bool $Status = null,
    ) {}
}
