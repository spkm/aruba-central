<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use spkm\ArubaCentral\Classic\Data\Iot\CollectorAssociationTokenResp;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns security token associated with a collector: GET /v1/iot_gateways/association/token/{collectorId}.
 */
class GetAssociationTokenForCollectorRequest extends ItemRequest
{
    protected ?string $dto = CollectorAssociationTokenResp::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $collectorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/iot_gateways/association/token/'.rawurlencode((string) $this->collectorId);
    }
}
