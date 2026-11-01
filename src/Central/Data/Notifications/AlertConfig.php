<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A AlertConfig record.
 */
readonly class AlertConfig extends Data
{
    /**
     * @param  array<mixed>|null  $rules
     */
    public function __construct(
        /** Human-readable name of the alert type. */
        public ?string $name = null,
        /** Description of what the alert monitors. */
        public ?string $description = null,
        /** Display label or tag for the alert configuration. */
        public ?string $label = null,
        /** Category the alert belongs to. */
        public ?string $category = null,
        /** Type of device this alert applies to. */
        public ?string $deviceType = null,
        /** Indicates whether this alert configuration is currently active or not. */
        public ?bool $enabled = null,
        /** Indicates whether the rule is system-defined or user-defined. One of: SYSTEM, USER. */
        public ?string $ruleSource = null,
        /** Auto-clear timeout duration, e.g. `1H`, `30D`. */
        public ?string $clearTimeout = null,
        /** Indicates whether this configuration is inherited from a parent scope or not. */
        public ?bool $inherited = null,
        /** The scope identifier this configuration belongs to. */
        public ?string $scopeId = null,
        /** The scope type this configuration belongs to. One of: GLOBAL, SITE, DEVICE. */
        public ?string $scopeType = null,
        /** List of threshold rules for this alert configuration. */
        public ?array $rules = null,
    ) {}
}
