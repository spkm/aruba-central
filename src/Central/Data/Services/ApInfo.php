<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ApInfo record.
 */
readonly class ApInfo extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $apCurrentOpmode = null,
        public ?string $apEthMac = null,
        public ?string $apModel = null,
        public ?string $apName = null,
        public ?string $apGreenStateUpdtime = null,
        /** One of: true, false. */
        public ?string $apInGreenState = null,
        public ?string $apSerial = null,
        public ?int $apTimestamp = null,
        public ?string $apTimezone = null,
        public ?string $apUptime = null,
        public ?string $customerMode = null,
        public ?string $ipAddr = null,
        public ?string $ipAddr6 = null,
        /** One of: true, false. */
        public ?string $isApDown = null,
        public ?string $siteId = null,
        public ?int $updateTimestamp = null,
        public ?int $updatedTs = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
