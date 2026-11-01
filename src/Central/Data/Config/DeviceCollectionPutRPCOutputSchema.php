<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceCollectionPutRPCOutputSchema record.
 */
readonly class DeviceCollectionPutRPCOutputSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of device-groups update operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message device-groups update operation. */
        public ?string $message = null,
        /** device-groups update operation status. */
        public ?string $status = null,
    ) {}
}
