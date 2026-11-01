<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A TemplateCustGroupDiffers record.
 */
readonly class TemplateCustGroupDiffers extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $groups
     */
    public function __construct(
        /** MD5SUM hash value for template text data for MSP only. */
        public ?string $template_hash = null,
        public ?bool $template_mismatch_to_entire_customer = null,
        public ?string $customer = null,
        public ?array $groups = null,
    ) {}
}
