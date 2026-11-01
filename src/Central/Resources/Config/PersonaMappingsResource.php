<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaPersonaMappingDevicePersonaMappingSchemaGETItem;
use spkm\ArubaCentral\Central\Requests\Config\PersonaMapping\ReadDevicePersonaMappingDeviceTypeListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PersonaMapping\ReadDevicePersonaMappingRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Persona Mapping API, from Aruba::configuration()->personaMappings().
 *
 * @extends Builder<ArubaPersonaMappingDevicePersonaMappingSchemaGETItem>
 */
class PersonaMappingsResource extends Builder
{
    protected string $idField = 'deviceType';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ArubaPersonaMappingDevicePersonaMappingSchemaGETItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ReadDevicePersonaMappingRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new ReadDevicePersonaMappingDeviceTypeListByIDRequest((string) $id);
    }
}
