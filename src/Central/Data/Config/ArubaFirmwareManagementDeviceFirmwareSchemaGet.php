<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaFirmwareManagementDeviceFirmwareSchemaGet record.
 */
readonly class ArubaFirmwareManagementDeviceFirmwareSchemaGet extends Data
{
    protected const ALIASES = ['site_distribution' => 'site-distribution'];

    /**
     * @param  array<mixed>|null  $issu
     */
    public function __construct(
        /** ISSU Configuration parameters Keys: software-update-rollback-timer, software-update-rollback-timer-enable. */
        public ?array $issu = null,
        /** Enables REST firmware site distribution */
        public ?bool $site_distribution = null,
    ) {}
}
