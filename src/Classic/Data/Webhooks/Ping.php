<?php

namespace spkm\ArubaCentral\Classic\Data\Webhooks;

use spkm\ArubaCentral\Data\Data;

/**
 * A Ping record.
 */
readonly class Ping extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** webhook url configured by the customer where the dispatcher will try to post information */
        public ?string $url = null,
        /** HTTP status code of the response from the url when information is posted */
        public ?string $status = null,
    ) {}
}
