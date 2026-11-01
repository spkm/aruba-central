<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaCloudVpnConnectAllTunnelConfigs record.
 */
readonly class ArubaCloudVpnConnectAllTunnelConfigs extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $tunnel_metadata
     * @param  array<mixed>|null  $tunnel_policies
     */
    public function __construct(
        /** Keys: ike_policy, ipsec_policy, tunnel_params. */
        public ?array $tunnel_metadata = null,
        /** Keys: policy_name. */
        public ?array $tunnel_policies = null,
    ) {}
}
