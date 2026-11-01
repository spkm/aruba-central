<?php

namespace spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet;

use spkm\ArubaCentral\Central\Data\Config\ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read existing Ethernet Interface instance configuration: GET /network-config/v1alpha1/ethernet-interfaces/{name}.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadEthernetInterfacesInterfaceByIDRequest extends ItemRequest
{
    protected ?string $dto = ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/ethernet-interfaces/'.rawurlencode((string) $this->name);
    }
}
