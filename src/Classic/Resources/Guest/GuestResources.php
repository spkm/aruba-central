<?php

namespace spkm\ArubaCentral\Classic\Resources\Guest;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Guest APIs, from Aruba::guest().
 *
 * @extends BaseResource<Data>
 */
class GuestResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The Portals API.
     */
    public function portals(): PortalsResource
    {
        return new PortalsResource($this->connector);
    }

    /**
     * The Sessions API.
     */
    public function sessions(string $portalId): SessionsResource
    {
        return new SessionsResource($this->connector, $portalId);
    }

    /**
     * The Visitors API.
     */
    public function visitors(string $portalId): VisitorsResource
    {
        return new VisitorsResource($this->connector, $portalId);
    }
}
