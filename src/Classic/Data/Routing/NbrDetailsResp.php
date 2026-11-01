<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A NbrDetailsResp record.
 */
readonly class NbrDetailsResp extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $details
     */
    public function __construct(
        /** Keys: preference, open_rx, open_tx, update_rx, update_tx, notification_rx, notification_tx, keepalive_rx, keepalive_tx, route_refresh_rx…. */
        public ?array $details = null,
    ) {}
}
