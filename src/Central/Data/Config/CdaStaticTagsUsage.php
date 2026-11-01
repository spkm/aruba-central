<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaStaticTagsUsage record.
 */
readonly class CdaStaticTagsUsage extends Data
{
    /**
     * @param  array<mixed>|null  $tagUsages
     */
    public function __construct(
        /** List of static tag usages A list of CdaStaticTagUsage records. */
        public ?array $tagUsages = null,
        /** Number of tags that are used in policies */
        public ?int $tagsInUse = null,
    ) {}
}
