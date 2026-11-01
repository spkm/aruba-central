<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A CollectorAssociationTokenResp record.
 */
readonly class CollectorAssociationTokenResp extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $collectorId = null,
        public ?string $customerId = null,
        public ?string $securityToken = null,
    ) {}
}
