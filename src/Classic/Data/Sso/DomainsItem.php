<?php

namespace spkm\ArubaCentral\Classic\Data\Sso;

use spkm\ArubaCentral\Data\Data;

/**
 * A DomainsItem record.
 */
readonly class DomainsItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Domain creation timestamp */
        public ?string $created_at = null,
        /** domain name */
        public ?string $domain = null,
    ) {}
}
