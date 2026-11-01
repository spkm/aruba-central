<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\CreateEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\ReadEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\ReadEthernetInterfacesRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\ReplaceEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\UpdateEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Interface Ethernet API, from Aruba::configuration()->ethernetInterfaces().
 *
 * @extends Builder<Data>
 */
class EthernetInterfacesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ReadEthernetInterfacesRequest($query);
    }

    /**
     * Create a new Ethernet Interface instance by name: POST /network-config/v1alpha1/ethernet-interfaces/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createEthernetInterfacesInterfaceByID(string $name, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreateEthernetInterfacesInterfaceByIDRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Read existing Ethernet Interface instance configuration: GET /network-config/v1alpha1/ethernet-interfaces/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function readEthernetInterfacesInterfaceByID(string $name, array $options = []): ?ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet
    {
        return $this->fetch(new ReadEthernetInterfacesInterfaceByIDRequest($name, $options));
    }

    /**
     * Create or update Ethernet Interface instance configuration: PUT /network-config/v1alpha1/ethernet-interfaces/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceEthernetInterfacesInterfaceByID(string $name, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new ReplaceEthernetInterfacesInterfaceByIDRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Update existing Ethernet Interface instance configuration: PATCH /network-config/v1alpha1/ethernet-interfaces/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateEthernetInterfacesInterfaceByID(string $name, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new UpdateEthernetInterfacesInterfaceByIDRequest($name, $this->payloadOf($attributes), $options));
    }
}
