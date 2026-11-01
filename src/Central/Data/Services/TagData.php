<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A TagData record.
 */
readonly class TagData extends Data
{
    /**
     * @param  array<mixed>|null  $deviceClassifications
     * @param  array<mixed>|null  $metadata
     * @param  array<mixed>|null  $lastKnownLocation
     */
    public function __construct(
        /** The UUID identifier of the Asset Tag. */
        public ?string $id = null,
        /** Resource type. */
        public ?string $type = null,
        /** Time of resource creation. */
        public ?CarbonImmutable $createdAt = null,
        /** MAC address of the Asset Tag. */
        public ?string $macAddress = null,
        /** Device classifications for the Asset Tag. */
        public ?array $deviceClassifications = null,
        /** The first-seen date/time of the tag. */
        public ?CarbonImmutable $firstSeen = null,
        /** Object with Asset Tag metadata. Keys: id, type, createdAt, updatedAt, name, labels, customId, notes. */
        public ?array $metadata = null,
        /** The last-known location of the tag. Keys: id, type, createdAt, siteId, buildingId, floorId, siteName, buildingName, floorName, floorNumber…. */
        public ?array $lastKnownLocation = null,
        /** Indicates whether an image is currently associated with the tag. `true` when an image has been uploaded via the image PUT endpoint and has not been removed via… */
        public ?bool $imagePresent = null,
    ) {}
}
