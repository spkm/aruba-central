<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A GuestWlan record.
 */
readonly class GuestWlan extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Guest wlan name */
        public ?string $wlan = null,
        /** Portal id of the splash page profile associated to the wlan */
        public ?string $portal_id = null,
        /** flag to indicate whether visitor account could be created for the wlan , portal with username password authentication type is allowed to created to visitors… */
        public ?bool $create_visitor = null,
    ) {}
}
