<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A WebhookRotateHmacKey record.
 */
readonly class WebhookRotateHmacKey extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** Keys: id, hmacKey, success, message. */
        public ?array $items = null,
    ) {}
}
