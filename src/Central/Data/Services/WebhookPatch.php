<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A WebhookPatch record.
 */
readonly class WebhookPatch extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** Keys: id, name, type, generation, createdAt, updatedAt, success, message, messageFormat. */
        public ?array $items = null,
    ) {}
}
