<?php

namespace spkm\ArubaCentral\Classic\Data\Vgw;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccountAddPostSchema record.
 */
readonly class AccountAddPostSchema extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $account_id = null,
        public ?string $error_code = null,
        public ?string $reason = null,
        public ?bool $success = null,
    ) {}
}
