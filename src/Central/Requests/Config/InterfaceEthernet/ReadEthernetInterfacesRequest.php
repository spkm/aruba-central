<?php

namespace spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Read list of Ethernet Interface configurations: GET /network-config/v1alpha1/ethernet-interfaces.
 *
 * Query parameters: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadEthernetInterfacesRequest extends ListRequest
{
    public string $resultKey = 'interface';

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
        return '/network-config/v1alpha1/ethernet-interfaces';
    }
}
