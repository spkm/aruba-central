<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A CancelUpgradeStatus record.
 */
readonly class CancelUpgradeStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** If there is no scheduled upgrade then status would be "failed" else it will be "success" */
        public ?string $status = null,
    ) {}
}
