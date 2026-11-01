<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\FloorMap;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create New Floor: POST /network-monitoring/v1/sitemaps/{site-id}/floors.
 *
 * Body: file, buildingId, buildingName, ceilingHeight, name, ordinal, buildingAddress, buildingType, buildingCoordinates.
 */
class CreateFloorRequest extends WriteRequest
{
    protected ?string $dto = FloorMap::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors';
    }
}
