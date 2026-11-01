<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Devices;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\UpdateDeviceNotesData;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update device notes by serial number: PATCH /network-monitoring/v1/devices/{serial-number}.
 *
 * Body: notes.
 */
class UpdateDeviceNotesRequest extends WriteRequest
{
    protected ?string $dto = UpdateDeviceNotesData::class;

    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/devices/'.rawurlencode((string) $this->serialNumber);
    }
}
