<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceVxlan\ReadVxlanRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Interface Vxlan API, from Aruba::configuration()->vxlan().
 *
 * @extends Builder<Data>
 */
class VxlanResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ReadVxlanRequest($query);
    }
}
