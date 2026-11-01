<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\Building;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Building: PUT /network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}.
 *
 * Body: buildingInput.
 */
class UpdateBuildingRequest extends WriteRequest
{
    protected ?string $dto = Building::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $buildingId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/buildings/'.rawurlencode((string) $this->buildingId);
    }
}
