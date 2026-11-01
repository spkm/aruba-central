<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A OperationPostResp record.
 */
readonly class OperationPostResp extends Data
{
    /**
     * @param  array<mixed>|null  $deviceOperations
     */
    public function __construct(
        /** Overall status of the operation request (Success/Error) */
        public ?string $status = null,
        /** Description of the overall operation status */
        public ?string $description = null,
        /** List of device operation results */
        public ?array $deviceOperations = null,
    ) {}
}
