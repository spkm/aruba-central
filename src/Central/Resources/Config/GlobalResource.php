<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Requests\Config\Global\GetGlobalScopeIdRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Global API, from Aruba::configuration()->global_().
 *
 * @extends BaseResource<Data>
 */
class GlobalResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Global Scope Id: GET /network-config/v1/global.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGlobalScopeId(array $options = []): mixed
    {
        return $this->fetch(new GetGlobalScopeIdRequest($options));
    }
}
