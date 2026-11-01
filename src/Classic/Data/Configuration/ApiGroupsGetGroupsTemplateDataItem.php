<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApiGroupsGetGroupsTemplateDataItem record.
 */
readonly class ApiGroupsGetGroupsTemplateDataItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $template_info
     */
    public function __construct(
        /** Group Name */
        public ?string $group = null,
        /** Configuration mode (Template or UI) per device type for a group */
        public ?array $template_info = null,
    ) {}
}
