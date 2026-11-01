<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PersonaMapping;

use spkm\ArubaCentral\Central\Data\Config\ArubaPersonaMappingDevicePersonaMappingSchemaGETItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of device types and their corresponding supported device functions.: GET /network-config/v1alpha1/device-persona-mapping.
 *
 * Query parameters: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadDevicePersonaMappingRequest extends ListRequest
{
    protected ?string $dto = ArubaPersonaMappingDevicePersonaMappingSchemaGETItem::class;

    public string $resultKey = 'device_type_list';

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
        return '/network-config/v1alpha1/device-persona-mapping';
    }
}
