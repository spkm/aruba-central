<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceMoveSiteSMSchema record.
 */
readonly class DeviceMoveSiteSMSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of site-collection deletion operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message site-collection deletion operation. */
        public ?string $message = null,
        /** site-collection delete operation status. */
        public ?string $status = null,
    ) {}
}
