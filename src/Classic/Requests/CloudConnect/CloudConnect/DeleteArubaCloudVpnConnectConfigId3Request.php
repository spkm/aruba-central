<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ConfigSummarySchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Delete AWS cloud provider endpoint config: DELETE /cloud-connect/v1/node_list/{node_id}/config/aws.
 *
 * Body: endpoints.
 */
class DeleteArubaCloudVpnConnectConfigId3Request extends WriteRequest
{
    protected ?string $dto = ConfigSummarySchema::class;

    protected Method $method = Method::DELETE;

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
        return '/cloud-connect/v1/node_list/'.rawurlencode((string) $this->nodeId).'/config/aws';
    }
}
