<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessRuleServices record.
 */
readonly class AccessRuleServices extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $service_name
     */
    public function __construct(
        /** Keys: services, throttling, destination. */
        public ?array $service_name = null,
    ) {}
}
