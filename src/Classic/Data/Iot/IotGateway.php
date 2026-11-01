<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A IotGateway record.
 */
readonly class IotGateway extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $apps
     */
    public function __construct(
        public ?array $apps = null,
        public ?int $createdAt = null,
        public ?string $customerId = null,
        public ?string $groupId = null,
        public ?string $id = null,
        public ?string $ipAddress = null,
        public ?string $name = null,
        public ?int $nodeCount = null,
        public ?string $scheduledUpgradeConfig = null,
        /** One of: WARNING, ONLINE, STARTING, OFFLINE. */
        public ?string $status = null,
        public ?string $statusString = null,
        public ?int $upgradeAvailable = null,
    ) {}
}
