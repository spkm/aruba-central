<?php

namespace spkm\ArubaCentral\Classic\Resources\Guest;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Guest\GuestAccess;
use spkm\ArubaCentral\Classic\Data\Guest\GuestEnabled;
use spkm\ArubaCentral\Classic\Data\Guest\GuestReprovision;
use spkm\ArubaCentral\Classic\Data\Guest\GuestWlan;
use spkm\ArubaCentral\Classic\Data\Guest\PortalLimitedData;
use spkm\ArubaCentral\Classic\Data\Guest\PreviewUrl;
use spkm\ArubaCentral\Classic\Data\Guest\Wifi4eu;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\CreateApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\DeleteApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestEnabledRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestReProvisionRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestStatisticsRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestWlansRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiPortalsRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\PreviewApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\UpdateApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\Wifi4euStatusRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Portals API, from Aruba::guest()->portals().
 *
 * @extends Builder<PortalLimitedData>
 */
class PortalsResource extends Builder
{
    protected string $idField = 'portalId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, PortalLimitedData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApiPortalsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetApiPortalRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateApiPortalRequest($body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateApiPortalRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteApiPortalRequest((string) $id, $options);
    }

    /**
     * Check if guest is enabled for current user.: GET /guest/v1/enabled.
     *
     * @param  array<string, mixed>  $options
     */
    public function enabled(array $options = []): ?GuestEnabled
    {
        return $this->fetch(new GetApiGuestEnabledRequest($options));
    }

    /**
     * Provision cloud guest for current customer: POST /guest/v1/reprovision.
     *
     * @param  array<string, mixed>  $options
     */
    public function reprovision(array $options = []): ?GuestReprovision
    {
        return $this->fetch(new GetApiGuestReProvisionRequest($options));
    }

    /**
     * Get summary statistics: GET /guest/v1/summary.
     *
     * @param  array<string, mixed>  $options
     */
    public function summary(int $days, string $ssid, array $options = []): ?GuestAccess
    {
        return $this->fetch(new GetApiGuestStatisticsRequest($days, $ssid, $options));
    }

    /**
     * Get all guest wlans: GET /guest/v1/wlans.
     *
     * @return ListResource<GuestWlan>
     */
    public function wlans(): ListResource
    {
        return new ListResource($this->connector, GuestWlan::class, fn (Query $query) => new GetApiGuestWlansRequest($query));
    }

    /**
     * Get preview url of guest portal profile: GET /guest/v1/portals/preview/{portal_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function preview(string $portalId, array $options = []): ?PreviewUrl
    {
        return $this->fetch(new PreviewApiPortalRequest($portalId, $options));
    }

    /**
     * WiFi4EU Status: POST /guest/v1/wifi4eu/lang_code/{lang_code}.
     *
     * @param  array<string, mixed>  $options
     */
    public function wifi4euStatus(string $langCode, string $networkId, array $options = []): ?Wifi4eu
    {
        return $this->fetch(new Wifi4euStatusRequest($langCode, $networkId, $options));
    }
}
