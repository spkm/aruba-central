<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnectorAssocResp;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Return Pageable List of Gateways: GET /v1/iot_gateways/association/collector/{collectorId}.
 */
class GetAssociationForCollectorRequest extends ItemRequest
{
    protected ?string $dto = ReporterConnectorAssocResp::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $collectorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/iot_gateways/association/collector/'.rawurlencode((string) $this->collectorId);
    }
}
