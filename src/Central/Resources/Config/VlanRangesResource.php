<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\VlanRange\CreateLayer2VlanRangeRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Vlan Range API, from Aruba::configuration()->vlanRanges().
 *
 * @extends BaseResource<Data>
 */
class VlanRangesResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Add or Update range of VLAN profiles: POST /network-config/v1alpha1/layer2-vlan-range.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createLayer2VlanRange(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreateLayer2VlanRangeRequest($this->payloadOf($attributes), $options));
    }
}
