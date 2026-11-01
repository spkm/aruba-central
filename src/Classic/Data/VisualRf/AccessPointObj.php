<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointObj record.
 */
readonly class AccessPointObj extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $access_point
     */
    public function __construct(
        /** Access Point information Keys: ap_id, ap_eth_mac, ap_name, floor_id, serial_number, model, latitude, longitude, x, y. */
        public ?array $access_point = null,
    ) {}
}
