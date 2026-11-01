<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Event record.
 */
readonly class Event extends Data
{
    public function __construct(
        /** The event type identifier */
        public ?string $eventId = null,
        /** Unique identifier for the event. */
        public ?string $eventIdentifier = null,
        /** Device serial number */
        public ?string $serialNumber = null,
        /** Timestamp when the event occurred at the source, in RFC 3339 format with milliseconds. */
        public ?CarbonImmutable $timeAt = null,
        /** Name of the event. */
        public ?string $eventName = null,
        /** Event category. */
        public ?string $category = null,
        /** Type of source that generated the event. One of: Access Point, Switch, Gateway, Wireless Client, Wired Client, Bridge. */
        public ?string $sourceType = null,
        /** Name of the device or client that generated the event. */
        public ?string $sourceName = null,
        /** Detailed description of the event. */
        public ?string $description = null,
        /** MAC address of the client involved in the event. */
        public ?string $clientMacAddress = null,
        /** MAC address of the device that generated the event. */
        public ?string $deviceMacAddress = null,
        /** Stack identifier for stack-capable devices. */
        public ?string $stackId = null,
        /** Basic Service Set Identifier for wireless events. */
        public ?string $bssid = null,
        /** Reason or cause of the event. */
        public ?string $reason = null,
        /** Severity level of the event. One of: positive, negative, neutral. */
        public ?string $severity = null,
    ) {}
}
