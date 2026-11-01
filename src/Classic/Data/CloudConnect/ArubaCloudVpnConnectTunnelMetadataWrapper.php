<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaCloudVpnConnectTunnelMetadataWrapper record.
 */
readonly class ArubaCloudVpnConnectTunnelMetadataWrapper extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $tunnel_metadata
     */
    public function __construct(
        /** Keys: ike_policy, ipsec_policy, tunnel_params. */
        public ?array $tunnel_metadata = null,
    ) {}
}
