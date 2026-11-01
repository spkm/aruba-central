<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A VlanIpListItem record.
 */
readonly class VlanIpListItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?int $id = null,
        public ?string $ip_addr = null,
        public ?string $ip_mask = null,
        public ?string $name = null,
    ) {}
}
