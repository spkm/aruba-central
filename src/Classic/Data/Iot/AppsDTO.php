<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A AppsDTO record.
 */
readonly class AppsDTO extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $app_id = null,
        public ?string $image = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $status_reason = null,
        public ?string $summary = null,
        public ?int $total_views = null,
        public ?int $version = null,
    ) {}
}
