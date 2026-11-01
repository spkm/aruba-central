<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaCloudVpnConnectTunnelPolicyConfig record.
 */
readonly class ArubaCloudVpnConnectTunnelPolicyConfig extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $ike_policy
     * @param  array<mixed>|null  $tunnel_params
     * @param  array<mixed>|null  $ipsec_policy
     */
    public function __construct(
        /** Keys: auth_method, auth_type, rekey_val, prf_method, dh_method, enc_method. */
        public ?array $ike_policy = null,
        /** Keys: force_tunnel_mode, force_natt. */
        public ?array $tunnel_params = null,
        /** Keys: pfs_method, auth_method, rekey_val, enc_method. */
        public ?array $ipsec_policy = null,
    ) {}
}
