<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ConfigSummarySchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Azure cloud provider endpoint config: PUT /cloud-connect/v1/node_list/{node_id}/config/azure.
 *
 * Body: endpoints.
 */
class PutArubaCloudVpnConnectConfigId4Request extends WriteRequest
{
    protected ?string $dto = ConfigSummarySchema::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $nodeId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/node_list/'.rawurlencode((string) $this->nodeId).'/config/azure';
    }
}
