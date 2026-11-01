<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use spkm\ArubaCentral\Classic\Data\Iot\IotGateway;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Return a Gateway by cluster Id: GET /v1/iot_gateways/{id}.
 *
 * Query options: checkStatus.
 */
class GetGatewayRequest extends ItemRequest
{
    protected ?string $dto = IotGateway::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/iot_gateways/'.rawurlencode((string) $this->id);
    }
}
