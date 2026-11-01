<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ClientPolicy record.
 */
readonly class ClientPolicy extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $rules
     */
    public function __construct(
        /** Time when the Client policy was added, added automatically. */
        public ?CarbonImmutable $added_at = null,
        /** AllowAllMacAuth property which is used to enable/disable allow all mac authentication. */
        public ?string $allow_all_mac_auth = null,
        /** Client Role for clients with tags that are not specified in the Rules. Must be a valid role, cannot be empty. */
        public ?string $default_role = null,
        /** WLAN network for clients that use dpp provisoning. */
        public ?string $dpp_wlan_network = null,
        /** Mapping rules of Client Profile Tags to Client Roles. A list of ClientPolicyRule records. */
        public ?array $rules = null,
        /** Client Role for clients not yet profiled. Deprecated; use default_role instead. */
        public ?string $unprofiled_client_role = null,
        /** Time when the Client policy was last updated, added automatically. */
        public ?CarbonImmutable $updated_at = null,
    ) {}
}
