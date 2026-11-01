<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A ZscalerZenNodesSchema record.
 */
readonly class ZscalerZenNodesSchema extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $zen_nodes
     */
    public function __construct(
        public ?bool $status = null,
        public ?array $zen_nodes = null,
    ) {}
}
