<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A GeofenceRepsonseEnabled record.
 */
readonly class GeofenceRepsonseEnabled extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** geofence status */
        public ?string $status = null,
    ) {}
}
