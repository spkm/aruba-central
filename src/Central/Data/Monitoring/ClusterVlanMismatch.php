<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClusterVlanMismatch record.
 */
readonly class ClusterVlanMismatch extends Data
{
    public function __construct(
        /** The number of VLANs that are good in health. */
        public ?int $good = null,
        /** The number of VLANs that are configured improperly. */
        public ?int $poor = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
