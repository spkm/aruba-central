<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaMacReg record.
 */
readonly class CdaMacReg extends Data
{
    /**
     * @param  array<mixed>|null  $staticTags
     */
    public function __construct(
        /** Whether the MAC was created by system(true) or admin(false). */
        public ?bool $autoCreated = null,
        /** Creation time of the MAC address entity. */
        public ?string $createdAt = null,
        /** MAC Registration display name. */
        public ?string $displayName = null,
        /** Whether the MAC account is enabled or disabled. */
        public ?bool $enable = null,
        /** ID of the MAC registraton. */
        public ?string $id = null,
        /** MAC address of the MAC Registration. */
        public ?string $macAddress = null,
        /** Modification time of the MAC address entity. */
        public ?string $modifiedAt = null,
        /** List of static tag names associated with this MAC registration. */
        public ?array $staticTags = null,
        public ?string $type = null,
    ) {}
}
