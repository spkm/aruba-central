<?php

namespace spkm\ArubaCentral\Classic\Data\Webhooks;

use spkm\ArubaCentral\Data\Data;

/**
 * A Webhook record.
 */
readonly class Webhook extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Webhook name */
        public ?string $name = null,
        /** id of Webhook */
        public ?string $wid = null,
    ) {}
}
