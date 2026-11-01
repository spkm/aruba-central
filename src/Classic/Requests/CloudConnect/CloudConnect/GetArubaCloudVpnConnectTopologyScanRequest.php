<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Classic\Data\CloudConnect\TopologyScanSchema;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Trigger cloud provider endpoint scan.: GET /cloud-connect/topology-scan.
 */
class GetArubaCloudVpnConnectTopologyScanRequest extends ItemRequest
{
    protected ?string $dto = TopologyScanSchema::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/topology-scan';
    }
}
