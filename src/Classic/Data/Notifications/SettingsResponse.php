<?php

namespace spkm\ArubaCentral\Classic\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A SettingsResponse record.
 */
readonly class SettingsResponse extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** id of settings on which required operation is performed */
        public ?string $result = null,
    ) {}
}
