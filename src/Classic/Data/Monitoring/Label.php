<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Label record.
 */
readonly class Label extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Label category ID */
        public ?int $category_id = null,
        /** Label category name */
        public ?string $category_name = null,
        /** Label ID */
        public ?int $label_id = null,
        /** Label name */
        public ?string $label_name = null,
    ) {}
}
