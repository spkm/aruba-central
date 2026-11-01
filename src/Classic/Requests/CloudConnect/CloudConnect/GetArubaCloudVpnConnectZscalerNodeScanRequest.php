<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Classic\Data\CloudConnect\ZscalerZenNodesSchema;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Zscaler node scan details.: GET /cloud-connect/zscaler/node-scan.
 */
class GetArubaCloudVpnConnectZscalerNodeScanRequest extends ItemRequest
{
    protected ?string $dto = ZscalerZenNodesSchema::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/zscaler/node-scan';
    }
}
