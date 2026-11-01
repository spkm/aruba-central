<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A PageAppsVersions record.
 */
readonly class PageAppsVersions extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['empty_' => 'empty'];

    /**
     * @param  array<mixed>|null  $content
     */
    public function __construct(
        /** A list of AppsVersionsDTO records. */
        public ?array $content = null,
        public ?bool $empty_ = null,
        public ?bool $first = null,
        public ?bool $last = null,
        public ?int $number_of_elements = null,
        public ?int $page_number = null,
        public ?int $page_size = null,
        public ?bool $sorted = null,
        public ?int $total_elements = null,
        public ?int $total_pages = null,
        public ?bool $unsorted = null,
    ) {}
}
