<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\ApRangingScanStatus;
use spkm\ArubaCentral\Central\Data\Services\AssetTagImage;
use spkm\ArubaCentral\Central\Data\Services\DeviceLocationSummary;
use spkm\ArubaCentral\Central\Data\Services\LaSitesInsightsForAPI;
use spkm\ArubaCentral\Central\Data\Services\LaTrendsResponseForAPI;
use spkm\ArubaCentral\Central\Data\Services\LocationUpdate;
use spkm\ArubaCentral\Central\Data\Services\StartApRangingScan;
use spkm\ArubaCentral\Central\Data\Services\TagData;
use spkm\ArubaCentral\Central\Data\Services\TagDataUpdate;
use spkm\ArubaCentral\Central\Requests\Services\Location\CreateAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\DelDeviceAdminLocationRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\DeleteAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\DeleteAssetTagImageRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetApRangingScanListRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetApRangingScanRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetAssetTagImageRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetDeviceDetailedLocationRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetDeviceLocationsRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetLaSitesInsightsForAPIRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetLaTrendsForAPIRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetLocationByIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\ListAssetTagDataRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\ListClientLocationsForAPIRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\PutDeviceAdminLocationRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\StartApRangingScanRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\StopApRangingScanRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\UpdateAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\UpdateAssetTagImageRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Location API, from Aruba::location().
 *
 * @extends BaseResource<Data>
 */
class LocationResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create Asset Tag metadata: POST /network-services/v1/asset-tags/{asset-tag-id}/metadata.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createAssetTagData(string $assetTagId, array|Data $attributes = [], array $options = []): ?TagDataUpdate
    {
        return $this->fetch(new CreateAssetTagDataByAssetTagIdRequest($assetTagId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete device coordinates: DELETE /network-services/v1/sites/{site-id}/devices/{serial-number}/location.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteDeviceAdminLocation(string $siteId, string $serialNumber, array $options = []): mixed
    {
        return $this->fetch(new DelDeviceAdminLocationRequest($siteId, $serialNumber, $options));
    }

    /**
     * Remove Asset Tag metadata: DELETE /network-services/v1/asset-tags/{asset-tag-id}/metadata.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteAssetTagData(string $assetTagId, array $options = []): mixed
    {
        return $this->fetch(new DeleteAssetTagDataByAssetTagIdRequest($assetTagId, $options));
    }

    /**
     * Delete Asset Tag image: DELETE /network-services/v1/asset-tags/{asset-tag-id}/image.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteAssetTagImage(string $assetTagId, array $options = []): mixed
    {
        return $this->fetch(new DeleteAssetTagImageRequest($assetTagId, $options));
    }

    /**
     * List AP ranging scans: GET /network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans.
     *
     * @return ListResource<ApRangingScanStatus>
     */
    public function rangingScans(string $siteId, string $floorId): ListResource
    {
        return new ListResource($this->connector, ApRangingScanStatus::class, fn (Query $query) => new GetApRangingScanListRequest($siteId, $floorId, $query));
    }

    /**
     * Get scan resource: GET /network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function rangingScan(string $siteId, string $floorId, string $scanId, array $options = []): ?ApRangingScanStatus
    {
        return $this->fetch(new GetApRangingScanRequest($siteId, $floorId, $scanId, $options));
    }

    /**
     * Get Asset Tag details: GET /network-services/v1/asset-tags/{asset-tag-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function assetTag(string $assetTagId, array $options = []): ?TagData
    {
        return $this->fetch(new GetAssetTagDataByAssetTagIdRequest($assetTagId, $options));
    }

    /**
     * Get Asset Tag image: GET /network-services/v1/asset-tags/{asset-tag-id}/image.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAssetTagImage(string $assetTagId, array $options = []): mixed
    {
        return $this->fetch(new GetAssetTagImageRequest($assetTagId, $options));
    }

    /**
     * Get device location details: GET /network-services/v1/sites/{site-id}/devices/{serial-number}/location.
     *
     * @param  array<string, mixed>  $options
     */
    public function deviceDetailedLocation(string $siteId, string $serialNumber, array $options = []): ?DeviceLocationSummary
    {
        return $this->fetch(new GetDeviceDetailedLocationRequest($siteId, $serialNumber, $options));
    }

    /**
     * List devices with location information: GET /network-services/v1/sites/{site-id}/device-locations.
     *
     * @return ListResource<DeviceLocationSummary>
     */
    public function deviceLocations(string $siteId): ListResource
    {
        return new ListResource($this->connector, DeviceLocationSummary::class, fn (Query $query) => new GetDeviceLocationsRequest($siteId, $query));
    }

    /**
     * Get the insights for each site of a tenant for a given time range.: GET /network-services/v1/location-analytics/sites/insights.
     *
     * @return ListResource<LaSitesInsightsForAPI>
     */
    public function analyticsSiteInsights(): ListResource
    {
        return new ListResource($this->connector, LaSitesInsightsForAPI::class, fn (Query $query) => new GetLaSitesInsightsForAPIRequest($query));
    }

    /**
     * Get all the trends of a client for a tenant or a site for a given time range.: GET /network-services/v1/location-analytics/trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function analyticsTrends(array $options = []): ?LaTrendsResponseForAPI
    {
        return $this->fetch(new GetLaTrendsForAPIRequest($options));
    }

    /**
     * Get location resource: GET /network-services/v1/sites/{site-id}/device-locations/{location-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deviceLocation(string $siteId, string $locationId, array $options = []): ?DeviceLocationSummary
    {
        return $this->fetch(new GetLocationByIdRequest($siteId, $locationId, $options));
    }

    /**
     * Get a list of Asset Tags: GET /network-services/v1/asset-tags.
     *
     * @return ListResource<Data>
     */
    public function assetTags(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListAssetTagDataRequest($query));
    }

    /**
     * Get locations of Wi-Fi clients: GET /network-services/v1/wifi-clients-locations.
     *
     * @return ListResource<Data>
     */
    public function clientLocations(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListClientLocationsForAPIRequest($query));
    }

    /**
     * Set device coordinates: POST /network-services/v1/sites/{site-id}/devices/{serial-number}/location.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceAdminLocation(string $siteId, string $serialNumber, array|Data $attributes = [], array $options = []): ?LocationUpdate
    {
        return $this->fetch(new PutDeviceAdminLocationRequest($siteId, $serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Start an AP ranging scan (USE WITH CAUTION): POST /network-services/v1/ap-ranging-scans.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function startRangingScan(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?StartApRangingScan
    {
        return $this->fetch(new StartApRangingScanRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Stop a scan: DELETE /network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function stopRangingScan(string $siteId, string $floorId, string $scanId, array $options = []): mixed
    {
        return $this->fetch(new StopApRangingScanRequest($siteId, $floorId, $scanId, $options));
    }

    /**
     * Update Asset Tag metadata: PUT /network-services/v1/asset-tags/{asset-tag-id}/metadata.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateAssetTagData(string $assetTagId, array|Data $attributes = [], array $options = []): ?TagDataUpdate
    {
        return $this->fetch(new UpdateAssetTagDataByAssetTagIdRequest($assetTagId, $this->payloadOf($attributes), $options));
    }

    /**
     * Upload or replace Asset Tag image: PUT /network-services/v1/asset-tags/{asset-tag-id}/image.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateAssetTagImage(string $assetTagId, array|Data $attributes = [], array $options = []): ?AssetTagImage
    {
        return $this->fetch(new UpdateAssetTagImageRequest($assetTagId, $this->payloadOf($attributes), $options));
    }
}
