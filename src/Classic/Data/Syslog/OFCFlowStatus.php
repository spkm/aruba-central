<?php

namespace spkm\ArubaCentral\Classic\Data\Syslog;

use spkm\ArubaCentral\Data\Data;

/**
 * A OFCFlowStatus record.
 */
readonly class OFCFlowStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** SerialID of which the flow delete status is queried */
        public ?string $serial_id = null,
        /** Flow Enabled/Disabled */
        public ?string $status = null,
    ) {}
}
