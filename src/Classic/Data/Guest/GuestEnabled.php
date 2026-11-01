<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A GuestEnabled record.
 */
readonly class GuestEnabled extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** status to indicate if guest is enabled or disabled for current customer. */
        public ?bool $Status = null,
    ) {}
}
