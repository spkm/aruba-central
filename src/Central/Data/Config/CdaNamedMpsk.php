<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaNamedMpsk record.
 */
readonly class CdaNamedMpsk extends Data
{
    public function __construct(
        /** Creation time of the MPSK entity. */
        public ?string $createdAt = null,
        /** Status of this named MPSK configuration. Can only be enabled or disabled. */
        public ?bool $enable = null,
        /** ID of the named MPSK. */
        public ?string $id = null,
        /** Modification time of the MPSK entity. */
        public ?string $modifiedAt = null,
        /** The password to be used to connect. */
        public ?string $mpsk = null,
        /** Name of mpsk entity */
        public ?string $name = null,
        /** Name of the CG network, this named MPSK belongs to. */
        public ?string $network = null,
        public ?string $type = null,
        /** Aruba Role to be assigned to device connected using this MPSK */
        public ?string $userRole = null,
    ) {}
}
