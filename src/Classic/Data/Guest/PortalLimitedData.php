<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A PortalLimitedData record.
 */
readonly class PortalLimitedData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $capture_url
     */
    public function __construct(
        /** Name of the portal */
        public ?string $name = null,
        /** Authentication type of portal such as (Social Login, Username/password etc.) */
        public ?string $auth_type = null,
        /** portal id */
        public ?string $id = null,
        /** Indicates whether a profile is shared among different groups */
        public ?bool $is_shared = null,
        /** Indicate whether current portal is a default portal */
        public ?bool $is_default = null,
        /** URL to be used in wlan captive profile configuration */
        public ?array $capture_url = null,
        /** to indicate whether portal uses email for authentication */
        public ?bool $register_accept_email = null,
        /** to indicate whether portal uses phone (sms) for authentication */
        public ?bool $register_accept_phone = null,
    ) {}
}
