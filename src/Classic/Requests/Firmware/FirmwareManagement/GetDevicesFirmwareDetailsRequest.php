<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareDeviceDetails;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Firmware Details of Devices: GET /firmware/v1/devices.
 *
 * Query parameters (* required): group, device_type*.
 */
class GetDevicesFirmwareDetailsRequest extends ListRequest
{
    protected ?string $dto = FirmwareDeviceDetails::class;

    public string $resultKey = 'devices';

    public ?string $totalKey = 'device_count';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/devices';
    }
}
