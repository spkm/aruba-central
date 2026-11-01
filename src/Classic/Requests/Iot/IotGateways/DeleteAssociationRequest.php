<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnAssocAddDeleteResp;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Delete Association: DELETE /v1/iot_gateways/association.
 *
 * Body: collectorId, reporterList.
 */
class DeleteAssociationRequest extends WriteRequest
{
    protected ?string $dto = ReporterConnAssocAddDeleteResp::class;

    protected Method $method = Method::DELETE;

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
