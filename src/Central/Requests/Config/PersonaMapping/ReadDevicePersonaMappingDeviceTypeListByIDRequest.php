<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PersonaMapping;

use spkm\ArubaCentral\Central\Data\Config\ArubaPersonaMappingDevicePersonaMappingdeviceTypeItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of device functions supported by device type.: GET /network-config/v1alpha1/device-persona-mapping/{device-type}.
 *
 * Query parameters: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadDevicePersonaMappingDeviceTypeListByIDRequest extends ListRequest
{
    protected ?string $dto = ArubaPersonaMappingDevicePersonaMappingdeviceTypeItem::class;

    public string $resultKey = 'supported-persona';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $deviceType, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/device-persona-mapping/'.rawurlencode((string) $this->deviceType);
    }
}
