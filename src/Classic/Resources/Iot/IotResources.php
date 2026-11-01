<?php

namespace spkm\ArubaCentral\Classic\Resources\Iot;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The IoT APIs, from Aruba::iot().
 *
 * @extends BaseResource<Data>
 */
class IotResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The App Store API.
     */
    public function appStore(): AppStoreResource
    {
        return new AppStoreResource($this->connector);
    }

    /**
     * The Apps API.
     */
    public function apps(): AppsResource
    {
        return new AppsResource($this->connector);
    }

    /**
     * The Devices API.
     */
    public function devices(): DevicesResource
    {
        return new DevicesResource($this->connector);
    }

    /**
     * The iot_gateways API.
     */
    public function gateways(): GatewaysResource
    {
        return new GatewaysResource($this->connector);
    }

    /**
     * The Transport Profile API.
     */
    public function transportProfiles(): TransportProfilesResource
    {
        return new TransportProfilesResource($this->connector);
    }
}
