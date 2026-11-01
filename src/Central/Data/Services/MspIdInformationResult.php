<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A MspIdInformationResult record.
 */
readonly class MspIdInformationResult extends Data
{
    /**
     * @param  array<mixed>|null  $tenantInformation
     */
    public function __construct(
        /** Opaque Transition Manager resource identifier. Customer and migration identifiers are not guaranteed to be UUIDs. */
        public ?string $id = null,
        /** Resource type prefixed by the network-services API group. */
        public ?string $type = null,
        public ?int $generation = null,
        public ?CarbonImmutable $createdAt = null,
        public ?CarbonImmutable $updatedAt = null,
        public ?string $migrationMspId = null,
        /** A list of MspTenantInformation records. */
        public ?array $tenantInformation = null,
    ) {}
}
