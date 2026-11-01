<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A WebhookCreate record.
 */
readonly class WebhookCreate extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** Keys: id, name, type, generation, createdAt, updatedAt, success, message, hmacKey, messageFormat. */
        public ?array $items = null,
    ) {}
}
