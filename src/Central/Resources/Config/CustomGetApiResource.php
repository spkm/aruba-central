<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaCustomGetApiCustomGetApiSchemaGet;
use spkm\ArubaCentral\Central\Requests\Config\CustomGetApi\ReadCustomGetApiRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Custom Get Api API, from Aruba::configuration()->customGetApi().
 *
 * @extends BaseResource<Data>
 */
class CustomGetApiResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Read custom-get-api: GET /network-config/v1alpha1/custom-get-api.
     *
     * @param  array<string, mixed>  $options
     */
    public function readCustomGetApi(array $options = []): ?ArubaCustomGetApiCustomGetApiSchemaGet
    {
        return $this->fetch(new ReadCustomGetApiRequest($options));
    }
}
