<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A WebhookUpdate record.
 */
readonly class WebhookUpdate extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** Keys: id, name, type, generation, createdAt, updatedAt, success, message, hmacKey, messageFormat. */
        public ?array $items = null,
    ) {}
}
