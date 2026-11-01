<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectTunnelMetadataWrapper;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the list of valid Tunnel Policy configurations: GET /cloud-connect/v1/tunnel-policy-config-metadata.
 */
class GetCloudConnectV1TunnelPolicyConfigMetadataRequest extends ItemRequest
{
    protected ?string $dto = ArubaCloudVpnConnectTunnelMetadataWrapper::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/tunnel-policy-config-metadata';
    }
}
