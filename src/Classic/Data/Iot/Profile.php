<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Profile record.
 */
readonly class Profile extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $profile
     */
    public function __construct(
        public ?string $collectorId = null,
        public ?CarbonImmutable $createdAt = null,
        public ?string $customerId = null,
        public ?string $description = null,
        public ?CarbonImmutable $modifiedAt = null,
        public ?string $name = null,
        /** Keys: auth, dataStream, destination, id. */
        public ?array $profile = null,
        public ?int $version = null,
    ) {}
}
