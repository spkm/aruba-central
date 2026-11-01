<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetConfigHealthDevicesItem record.
 */
readonly class GetConfigHealthDevicesItem extends Data
{
    /**
     * @param  array<mixed>|null  $activeIssues
     */
    public function __construct(
        /** List of active issues with the device configuration. */
        public ?array $activeIssues = null,
        /** Configuration status of the device. One of: SYNCHRONIZED, OUT_OF_SYNC, UPDATE_IN_PROGRESS, SYNC_WITH_LIMITATIONS, UNKNOWN. */
        public ?string $configStatus = null,
        /** The device is deployed as. */
        public ?string $deployment = null,
        /** Device function of the device. */
        public ?string $deviceFunction = null,
        /** Name of the device group the device is assigned to. */
        public ?string $deviceGroupName = null,
        /** Indicates if the device configuration is filtered due to non-blocking issues. */
        public ?bool $filteredConfig = null,
        /** Time when the last config was pushed to the device, in milliseconds since the epoch. */
        public ?string $lastConfigTimestamp = null,
        /** Model of the device. */
        public ?string $model = null,
        /** Hostname of the device. */
        public ?string $name = null,
        /** Recommended action to fix the highest priority issue with the device configuration. */
        public ?string $recommendedAction = null,
        /** Role of the device in the network. */
        public ?string $role = null,
        /** Serial of the device. */
        public ?string $serial = null,
        /** Name of the site collection the device is assigned to. */
        public ?string $siteCollectionName = null,
        /** Name of the site the device is assigned to. */
        public ?string $siteName = null,
        /** Highest priority issue with the device configuration. */
        public ?string $topPriorityIssue = null,
        /** Type of the device. */
        public ?string $type = null,
    ) {}
}
