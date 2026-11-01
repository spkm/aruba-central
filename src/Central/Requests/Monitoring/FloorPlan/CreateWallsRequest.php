<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\Overlay;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create Wall: POST /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls.
 *
 * Body: items.
 */
class CreateWallsRequest extends WriteRequest
{
    protected ?string $dto = Overlay::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $floorId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors/'.rawurlencode((string) $this->floorId).'/walls';
    }
}
