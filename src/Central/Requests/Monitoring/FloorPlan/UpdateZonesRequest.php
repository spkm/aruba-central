<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\Overlay;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update zones: PUT /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones.
 *
 * Body: items.
 */
class UpdateZonesRequest extends WriteRequest
{
    protected ?string $dto = Overlay::class;

    protected Method $method = Method::PUT;

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
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors/'.rawurlencode((string) $this->floorId).'/zones';
    }
}
