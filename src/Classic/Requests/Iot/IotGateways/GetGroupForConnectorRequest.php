<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use spkm\ArubaCentral\Classic\Data\Iot\GroupConnResp;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns connector to group mapping: GET /v1/iot_gateways/groups/connector/{connectorId}.
 */
class GetGroupForConnectorRequest extends ItemRequest
{
    protected ?string $dto = GroupConnResp::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $connectorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/iot_gateways/groups/connector/'.rawurlencode((string) $this->connectorId);
    }
}
