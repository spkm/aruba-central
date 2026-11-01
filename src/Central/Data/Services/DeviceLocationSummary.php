<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceLocationSummary record.
 */
readonly class DeviceLocationSummary extends Data
{
    /**
     * @param  array<mixed>|null  $consolidatedLocation
     */
    public function __construct(
        /** Uniquely generated ID for a device location. */
        public ?string $id = null,
        /** The device serial number. */
        public ?string $serialNumber = null,
        /** A string indicating the networking device type. One of: ACCESS_POINT, SWITCH, GATEWAY. */
        public ?string $type = null,
        /** Timestamp in ISO 8601 format with a precision of seconds. The time is in the UTC timezone. Format: [YYYY]-[MM]-[DD]T[hh]:[mm]:[ss] */
        public ?string $createdAt = null,
        /** Site ID associated with the device commonly in UUID format. */
        public ?string $siteId = null,
        /** Building ID associated with the device in UUID format. Omitted if no specific building is associated with the device. */
        public ?string $buildingId = null,
        /** Floor ID associated with the device in UUID format. */
        public ?string $floorId = null,
        /** If included this field contains a logical representation of the floor level. This value is relevant only in relation to a building; the value is relative to… */
        public ?float $floorLevel = null,
        public ?string $tenantId = null,
        public ?string $ipv4 = null,
        public ?string $ipv6 = null,
        public ?string $macAddress = null,
        public ?string $model = null,
        public ?string $deployment = null,
        /** One of: ONLINE, OFFLINE. */
        public ?string $status = null,
        /** Longitude, latitude, altitude and floor position. The system can return location uncertainty in two formats. The **LCIUncertainty** field is a similar ellipse… Keys: source, timestamp, cartesianCoordinates, center, lciUncertainty, altitude. */
        public ?array $consolidatedLocation = null,
    ) {}
}
