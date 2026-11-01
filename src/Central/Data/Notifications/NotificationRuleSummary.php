<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A notification rule: what it listens for and where it delivers.
 */
readonly class NotificationRuleSummary extends Data
{
    protected const EXTRA = true;

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Name of the rule. */
        public ?string $name = null,
        /** Further fields Central sends, under its own keys. */
        public array $extra = [],
    ) {}
}
