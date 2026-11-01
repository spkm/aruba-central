<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A LicenseApplication record.
 */
readonly class LicenseApplication extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $data
     * @param  array<mixed>|null  $meta
     */
    public function __construct(
        /** Keys: allowedDeviceClasses, appId, appStoreStatus, categories, description, icon, installedStatus, latestVersion, name, platformUrl…. */
        public ?array $data = null,
        public ?string $licenseType = null,
        public ?array $meta = null,
    ) {}
}
