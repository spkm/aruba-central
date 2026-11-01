<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceLicenseStatus record.
 */
readonly class DeviceLicenseStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $category_id
     */
    public function __construct(
        /** count in number */
        public ?array $category_id = null,
        public ?string $device_id = null,
        public ?string $device_mac = null,
        public ?string $device_name = null,
        public ?string $device_type = null,
        public ?int $site_id = null,
        public ?string $site_name = null,
        public ?string $status = null,
    ) {}
}
