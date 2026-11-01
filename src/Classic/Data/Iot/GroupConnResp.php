<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A GroupConnResp record.
 */
readonly class GroupConnResp extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $connectorId = null,
        public ?string $groupId = null,
    ) {}
}
