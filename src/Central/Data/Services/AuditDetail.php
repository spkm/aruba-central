<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A AuditDetail record.
 */
readonly class AuditDetail extends Data
{
    public function __construct(
        /** Unique identifier of the resource. */
        public ?string $id = null,
        /** Resource type. */
        public ?string $type = null,
        /** Monotonically increasing update counter. */
        public ?int $generation = null,
        /** RFC 3339 UTC timestamp when the resource was created. */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 UTC timestamp when the resource was last updated. */
        public ?CarbonImmutable $updatedAt = null,
        /** The audit id of audit. */
        public ?string $auditId = null,
        /** Category of the executed action. */
        public ?string $category = null,
        /** RFC 3339 UTC timestamp of when the operation executed. */
        public ?string $occurredOn = null,
        /** Description of the executed action */
        public ?string $description = null,
        /** Source IP Address of the user executed the operation. */
        public ?string $ipAddress = null,
        /** Brief text specifying the executed operation. */
        public ?string $action = null,
        /** Email ID of the user executed the operation. */
        public ?string $source = null,
        /** Sub-category of the executed action. */
        public ?string $subCategory = null,
        /** The serial number or Host Name of the audit. */
        public ?string $destinationName = null,
        /** Name of the entity/component on which action has been performed. */
        public ?string $destination = null,
    ) {}
}
