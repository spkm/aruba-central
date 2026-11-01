<?php

namespace spkm\ArubaCentral\Central\Requests\Config\InterfaceVxlan;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Read configured VXLAN profiles: GET /network-config/v1alpha1/vxlan.
 *
 * Query parameters: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadVxlanRequest extends ListRequest
{
    public string $resultKey = 'profile';

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
        return '/network-config/v1alpha1/vxlan';
    }
}
