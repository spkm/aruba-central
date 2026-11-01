<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceCollectionPostRPCOutputSchema record.
 */
readonly class DeviceCollectionPostRPCOutputSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of device-groups creation operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message device-groups creation operation. */
        public ?string $message = null,
        /** device-groups creation operation status. */
        public ?string $status = null,
    ) {}
}
