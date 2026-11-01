<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Alert record.
 */
readonly class Alert extends Data
{
    public function __construct(
        /** Unique identifier for the alert. */
        public ?string $id = null,
        /** Alert key. */
        public ?string $key = null,
        /** Category of the alert. */
        public ?string $category = null,
        /** Name of the alert. */
        public ?string $name = null,
        /** Severity level of the alert. */
        public ?string $severity = null,
        /** Priority level of the alert. */
        public ?string $priority = null,
        /** Current status of the alert. */
        public ?string $status = null,
        /** Summary description of the alert. */
        public ?string $summary = null,
        /** Timestamp when the alert was created. */
        public ?CarbonImmutable $createdAt = null,
        /** Timestamp when the alert was last updated. */
        public ?CarbonImmutable $updatedAt = null,
        /** Identifier of the user who last updated the alert. */
        public ?string $updatedBy = null,
        /** Type of the resource. */
        public ?string $type = null,
        /** Type of device associated with the alert. */
        public ?string $deviceType = null,
        /** The reason an alert is cleared. This will be populated only when the status is cleared. */
        public ?string $clearedReason = null,
    ) {}
}
