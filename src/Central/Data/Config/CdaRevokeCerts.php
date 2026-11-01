<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaRevokeCerts record.
 */
readonly class CdaRevokeCerts extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** Count of items returned. */
        public ?int $count = null,
        /** List of revoke cert responses A list of CdaRevokeCertResponse records. */
        public ?array $items = null,
    ) {}
}
