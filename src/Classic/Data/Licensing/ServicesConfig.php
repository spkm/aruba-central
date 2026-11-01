<?php

namespace spkm\ArubaCentral\Classic\Data\Licensing;

use spkm\ArubaCentral\Data\Data;

/**
 * A ServicesConfig record.
 */
readonly class ServicesConfig extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $service_name
     */
    public function __construct(
        /** Keys: display_name, is_device_service, tokens_per_device. */
        public ?array $service_name = null,
    ) {}
}
