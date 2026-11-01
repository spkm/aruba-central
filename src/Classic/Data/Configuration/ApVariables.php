<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApVariables record.
 */
readonly class ApVariables extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $ipv6addr
     */
    public function __construct(
        public ?string $country = null,
        public ?bool $country_mismatch = null,
        public ?string $guid = null,
        public ?string $ipaddr = null,
        public ?array $ipv6addr = null,
        public ?string $name = null,
    ) {}
}
