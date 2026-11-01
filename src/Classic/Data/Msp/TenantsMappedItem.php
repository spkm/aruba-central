<?php

namespace spkm\ArubaCentral\Classic\Data\Msp;

use spkm\ArubaCentral\Data\Data;

/**
 * A TenantsMappedItem record.
 */
readonly class TenantsMappedItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $group
     */
    public function __construct(
        /** Customer Name */
        public ?string $customer_name = null,
        /** Customer Id */
        public ?string $customer_id = null,
        /** Group information */
        public ?array $group = null,
    ) {}
}
