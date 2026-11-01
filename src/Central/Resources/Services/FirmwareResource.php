<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\FirmwareDetailsItem;
use spkm\ArubaCentral\Central\Data\Services\ListApLiveUpgradesItem;
use spkm\ArubaCentral\Central\Data\Services\ListDeviceLiveUpgradesItem;
use spkm\ArubaCentral\Central\Data\Services\ListGatewayLiveUpgradesItem;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\GetFirmwareDetailsListRequest;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\ListApLiveUpgradesRequest;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\ListDeviceLiveUpgradesRequest;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\ListGatewayLiveUpgradesRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Firmware Management API, from Aruba::firmware().
 *
 * @extends Builder<FirmwareDetailsItem>
 */
class FirmwareResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, FirmwareDetailsItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetFirmwareDetailsListRequest($query);
    }

    /**
     * Get all AP upgrades: GET /network-services/v1/ap-live-upgrades.
     *
     * @return ListResource<ListApLiveUpgradesItem>
     */
    public function apLiveUpgrades(): ListResource
    {
        return new ListResource($this->connector, ListApLiveUpgradesItem::class, fn (Query $query) => new ListApLiveUpgradesRequest($query));
    }

    /**
     * Get device upgrades: GET /network-services/v1/device-live-upgrades.
     *
     * @return ListResource<ListDeviceLiveUpgradesItem>
     */
    public function deviceLiveUpgrades(): ListResource
    {
        return new ListResource($this->connector, ListDeviceLiveUpgradesItem::class, fn (Query $query) => new ListDeviceLiveUpgradesRequest($query));
    }

    /**
     * Get all Gateway upgrades: GET /network-services/v1/gateway-live-upgrades.
     *
     * @return ListResource<ListGatewayLiveUpgradesItem>
     */
    public function gatewayLiveUpgrades(): ListResource
    {
        return new ListResource($this->connector, ListGatewayLiveUpgradesItem::class, fn (Query $query) => new ListGatewayLiveUpgradesRequest($query));
    }
}
