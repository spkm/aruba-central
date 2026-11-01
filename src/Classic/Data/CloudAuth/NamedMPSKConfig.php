<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A NamedMPSKConfig record.
 */
readonly class NamedMPSKConfig extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Identifier for the named MPSK */
        public ?string $id = null,
        /** The password to be used to connect. */
        public ?string $mpsk = null,
        /** Name to identify the mpsk password with */
        public ?string $name = null,
        /** Aruba Role to be assigned to device connected using this MPSK password. */
        public ?string $role = null,
        /** Named MPSK Status Status of this named MPSK configuration. Can only be enabled or disabled. enum: [enabled,disabled] */
        public ?string $status = null,
    ) {}
}
