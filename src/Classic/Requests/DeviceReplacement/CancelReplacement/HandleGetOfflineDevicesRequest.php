<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use spkm\ArubaCentral\Classic\Data\DeviceReplacement\OfflineDevicesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all offline devices: GET /v1/offline_devices.
 *
 * Query parameters (* required): tenant_id, device_type*, site_id*.
 */
class HandleGetOfflineDevicesRequest extends ListRequest
{
    protected ?string $dto = OfflineDevicesItem::class;

    public string $resultKey = 'result';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/offline_devices';
    }
}
