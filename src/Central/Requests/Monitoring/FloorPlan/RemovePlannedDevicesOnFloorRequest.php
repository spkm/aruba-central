<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\RemoveDevice;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Remove planned devices on the FloorMap: DELETE /network-monitoring/v1/sitemaps/{site-id}/network-devices-planned.
 *
 * Body: removeDevices.
 */
class RemovePlannedDevicesOnFloorRequest extends WriteRequest
{
    protected ?string $dto = RemoveDevice::class;

    protected Method $method = Method::DELETE;

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
