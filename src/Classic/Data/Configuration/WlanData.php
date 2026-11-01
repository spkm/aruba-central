<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A WlanData record.
 */
readonly class WlanData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $wlan
     */
    public function __construct(
        /** Keys: essid, type, wpa_passphrase, wpa_passphrase_changed, is_locked, captive_profile_name, bandwidth_limit_up, bandwidth_limit_down, bandwidth_limit_peruser_up, bandwidth_limit_peruser_down…. */
        public ?array $wlan = null,
    ) {}
}
