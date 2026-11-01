<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A NotificationRule record.
 */
readonly class NotificationRule extends Data
{
    /**
     * @param  array<mixed>|null  $sourceTypes
     * @param  array<mixed>|null  $source
     * @param  array<mixed>|null  $destination
     */
    public function __construct(
        /** Unique identifier of the notification rule. */
        public ?string $id = null,
        /** Type identifier for the notification rule. */
        public ?string $type = null,
        /** Name of the notification rule. */
        public ?string $name = null,
        /** Description of the notification rule. */
        public ?string $description = null,
        /** Indicates whether the notification rule is enabled. */
        public ?bool $enabled = null,
        /** List of source types for the notification rule. */
        public ?array $sourceTypes = null,
        /** Data source details for the notification rule. Keys: alerts. */
        public ?array $source = null,
        /** Notification destination details for the notification rule. Keys: email, webhook, syslog. */
        public ?array $destination = null,
    ) {}
}
