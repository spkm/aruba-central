<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnAssocAddDeleteResp;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add Association: POST /v1/iot_gateways/association.
 *
 * Body: collectorId, collectorIp, reporterList.
 */
class AddAssociationRequest extends WriteRequest
{
    protected ?string $dto = ReporterConnAssocAddDeleteResp::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/iot_gateways/association';
    }
}
