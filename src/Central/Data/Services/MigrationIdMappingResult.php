<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A MigrationIdMappingResult record.
 */
readonly class MigrationIdMappingResult extends Data
{
    public function __construct(
        /** Opaque Transition Manager resource identifier. Customer and migration identifiers are not guaranteed to be UUIDs. */
        public ?string $id = null,
        /** Resource type prefixed by the network-services API group. */
        public ?string $type = null,
        public ?int $generation = null,
        public ?CarbonImmutable $createdAt = null,
        public ?CarbonImmutable $updatedAt = null,
        public ?string $migrationId = null,
        public ?string $customerId = null,
        public ?bool $success = null,
        public ?string $message = null,
    ) {}
}
