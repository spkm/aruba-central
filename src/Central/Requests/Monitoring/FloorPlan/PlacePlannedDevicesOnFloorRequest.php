<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceplacementPost;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Place planned devices: POST /network-monitoring/v1/sitemaps/{site-id}/network-devices-planned.
 *
 * Body: devicesOnFloor.
 */
class PlacePlannedDevicesOnFloorRequest extends WriteRequest
{
    protected ?string $dto = DeviceplacementPost::class;

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
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/network-devices-planned';
    }
}
