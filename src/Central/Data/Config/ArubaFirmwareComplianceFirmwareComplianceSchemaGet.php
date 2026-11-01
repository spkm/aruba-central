<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaFirmwareComplianceFirmwareComplianceSchemaGet record.
 */
readonly class ArubaFirmwareComplianceFirmwareComplianceSchemaGet extends Data
{
    protected const ALIASES = ['active_partition' => 'active-partition', 'allow_unsafe_upgrades' => 'allow-unsafe-upgrades', 'enforcement_schedule' => 'enforcement-schedule', 'local_image_server_url' => 'local-image-server-url', 'upgrade_mode' => 'upgrade-mode', 'version_chart' => 'version-chart'];

    /**
     * @param  array<mixed>|null  $enforcement_schedule
     * @param  array<mixed>|null  $version_chart
     */
    public function __construct(
        /** Partition to upgrade One of: PRIMARY, SECONDARY. */
        public ?string $active_partition = null,
        /** Enable non-failsafe module upgrade of CX switches. Ensure that the switch will not lose power, be rebooted again, or have any modules removed until all updates… */
        public ?bool $allow_unsafe_upgrades = null,
        /** User maintained description for the firmware policy. System does not validate this for duplicates */
        public ?string $description = null,
        /** Enable or Disable Firmware Policy configuration. If not enabled, firmware policy configuration will not be inherited from parent scope configuration for this… */
        public ?bool $enable = null,
        /** Info related to scheduled firmware upgrade Keys: reboot-schedule, upgrade-new-devices-immediately, upgrade-schedule, use-device-local-time. */
        public ?array $enforcement_schedule = null,
        /** Local image download server URL to use instead of general image server */
        public ?string $local_image_server_url = null,
        /** User maintained name for the firmware policy. System does not validate this for duplicates */
        public ?string $name = null,
        /** Hitless/Live upgrade or regular upgrade One of: REGULAR, LIVE. */
        public ?string $upgrade_mode = null,
        /** Version Chart Keys: exception, lte-modem-version, version. */
        public ?array $version_chart = null,
    ) {}
}
