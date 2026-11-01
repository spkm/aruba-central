<?php

namespace spkm\ArubaCentral\Classic\Resources\Routing;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Device routing APIs, from Aruba::routing().
 *
 * @extends BaseResource<Data>
 */
class RoutingResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The Neighbor API.
     */
    public function bgp(): BgpResource
    {
        return new BgpResource($this->connector);
    }

    /**
     * The Area API.
     */
    public function ospf(): OspfResource
    {
        return new OspfResource($this->connector);
    }

    /**
     * The Connection API.
     */
    public function overlay(): OverlayResource
    {
        return new OverlayResource($this->connector);
    }

    /**
     * The Neighbor API.
     */
    public function rip(): RipResource
    {
        return new RipResource($this->connector);
    }

    /**
     * The Route API.
     */
    public function routes(): RoutesResource
    {
        return new RoutesResource($this->connector);
    }
}
