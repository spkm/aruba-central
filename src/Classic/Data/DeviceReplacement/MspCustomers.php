<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceReplacement;

use spkm\ArubaCentral\Data\Data;

/**
 * A MspCustomers record.
 */
readonly class MspCustomers extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Time at which the API request was made */
        public ?string $begin_time = null,
        /** Time at which API request completed */
        public ?string $end_time = null,
        /** Keys: customers. */
        public ?array $result = null,
        /** Status of the request */
        public ?string $status = null,
    ) {}
}
