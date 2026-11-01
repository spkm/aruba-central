<?php

namespace spkm\ArubaCentral\Classic\Data\Webhooks;

use spkm\ArubaCentral\Data\Data;

/**
 * A Token record.
 */
readonly class Token extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Name of the webhook setting */
        public ?string $name = null,
        /** secure token generated for the webhook */
        public ?string $secure_token = null,
    ) {}
}
