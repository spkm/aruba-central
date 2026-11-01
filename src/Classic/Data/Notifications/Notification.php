<?php

namespace spkm\ArubaCentral\Classic\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A Notification record.
 */
readonly class Notification extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $details
     * @param  array<mixed>|null  $labels
     */
    public function __construct(
        /** Notification ID */
        public ?string $id = null,
        /** severity */
        public ?string $severity = null,
        /** Customer ID */
        public ?string $customer_id = null,
        /** Device ID */
        public ?string $device_id = null,
        /** Additional info in the form of assorted key value pairs. */
        public ?array $details = null,
        /** Alert type ID */
        public ?string $nid = null,
        /** Notification Settings ID */
        public ?string $settings_id = null,
        /** When the event occured. The value is epoch seconds */
        public ?float $timestamp = null,
        /** Group name for notification */
        public ?string $group_name = null,
        /** list labels for notification */
        public ?array $labels = null,
        /** Notification type. This is one of device, client, user_management and ids_events */
        public ?string $type = null,
        /** Notification acknowledge status */
        public ?bool $acknowledged = null,
        /** Event description */
        public ?string $description = null,
        /** Notification state */
        public ?string $state = null,
        /** User who acknowledged/closed the event */
        public ?string $acknowledged_by = null,
        /** Time when user/system acknowledged the event */
        public ?float $acknowledged_timestamp = null,
        /** When the event occured. The value is epoch seconds */
        public ?float $created_timestamp = null,
    ) {}
}
