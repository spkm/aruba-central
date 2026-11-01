<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A AIOpsInsightMuteResult record.
 */
readonly class AIOpsInsightMuteResult extends Data
{
    public function __construct(
        public ?string $insightId = null,
        /** Site the mute applies to. Null when applied at NOC/global scope. */
        public ?string $siteId = null,
        /** One of: MUTE, UNMUTE. */
        public ?string $action = null,
    ) {}
}
