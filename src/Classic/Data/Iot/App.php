<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A App record.
 */
readonly class App extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $allowedDeviceClasses
     * @param  array<mixed>|null  $appStoreStatus
     * @param  array<mixed>|null  $categories
     * @param  array<mixed>|null  $installedStatus
     * @param  array<mixed>|null  $requiredConfig
     * @param  array<mixed>|null  $requiredEnvironmentVariables
     */
    public function __construct(
        public ?array $allowedDeviceClasses = null,
        public ?string $appId = null,
        public ?array $appStoreStatus = null,
        public ?array $categories = null,
        public ?string $description = null,
        public ?string $icon = null,
        public ?array $installedStatus = null,
        public ?int $latestVersion = null,
        public ?string $name = null,
        public ?string $platformUrl = null,
        public ?array $requiredConfig = null,
        public ?array $requiredEnvironmentVariables = null,
        public ?string $shortDescription = null,
        public ?string $vendor = null,
        public ?string $website = null,
    ) {}
}
