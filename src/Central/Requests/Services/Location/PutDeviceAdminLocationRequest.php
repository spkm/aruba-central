<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\LocationUpdate;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set device coordinates: POST /network-services/v1/sites/{site-id}/devices/{serial-number}/location.
 *
 * Body: cartesianCoordinates, center, lciUncertainty, altitude.
 */
class PutDeviceAdminLocationRequest extends WriteRequest
{
    protected ?string $dto = LocationUpdate::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $serialNumber, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/sites/'.rawurlencode((string) $this->siteId).'/devices/'.rawurlencode((string) $this->serialNumber).'/location';
    }
}
