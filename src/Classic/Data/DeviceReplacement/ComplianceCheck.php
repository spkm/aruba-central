<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceReplacement;

use spkm\ArubaCentral\Data\Data;

/**
 * A ComplianceCheck record.
 */
readonly class ComplianceCheck extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Begin time of request */
        public ?string $begin_time = null,
        /** End time of request */
        public ?string $end_time = null,
        /** Keys: firmware, license, model, monitoring, replacement, status. */
        public ?array $result = null,
        /** Status of this request */
        public ?string $status = null,
    ) {}
}
