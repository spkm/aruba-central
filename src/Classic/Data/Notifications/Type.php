<?php

namespace spkm\ArubaCentral\Classic\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A Type record.
 */
readonly class Type extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Notification Type Id */
        public ?int $id = null,
        /** name */
        public ?string $name = null,
        /** desc */
        public ?string $desc = null,
        /** category */
        public ?string $category = null,
    ) {}
}
