<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\Building;
use spkm\ArubaCentral\Central\Data\Monitoring\BuildingWithFloorsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\CatalogueApsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceassignmentPost;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceplacementPost;
use spkm\ArubaCentral\Central\Data\Monitoring\FloorMap;
use spkm\ArubaCentral\Central\Data\Monitoring\ImportStatus;
use spkm\ArubaCentral\Central\Data\Monitoring\Overlay;
use spkm\ArubaCentral\Central\Data\Monitoring\RemoveDevice;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteInfo;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\WallsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\WallTypesItem;
use spkm\ArubaCentral\Central\Data\Monitoring\ZonesItem;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ChangeDeviceAssignmentRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateZonesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\DeleteWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\DeleteWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\DeleteZonesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetAssociatedDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetBuildingsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetCatalogueRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetFloorMapImageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetFloorMapRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetImportStatusRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetPlacedDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetPlacedPlannedDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetZonesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ImportfloorsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ListSitemapSitesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\PlaceDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\PlacePlannedDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemoveBuildingRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemoveDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemovefloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemovePlannedDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ReplaceimageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ScaleFloorMapRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateBuildingRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateFloormapRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateZonesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The FloorPlan API, from Aruba::floorPlans().
 *
 * @extends BaseResource<Data>
 */
class FloorPlansResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Assign/Unassign devices to the FloorPlan: POST /network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function changeDeviceAssignment(string $siteId, array|Data $attributes = [], array $options = []): ?DeviceassignmentPost
    {
        return $this->fetch(new ChangeDeviceAssignmentRequest($siteId, $this->payloadOf($attributes), $options));
    }

    /**
     * Create New Floor: POST /network-monitoring/v1/sitemaps/{site-id}/floors.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createFloor(string $siteId, array|Data $attributes = [], array $options = []): ?FloorMap
    {
        return $this->fetch(new CreateFloorRequest($siteId, $this->payloadOf($attributes), $options));
    }

    /**
     * Create Wall: POST /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createWalls(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?Overlay
    {
        return $this->fetch(new CreateWallsRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Create Wall Types: POST /network-monitoring/v1/wall-types.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createWallTypes(array|Data $attributes = [], array $options = []): ?Overlay
    {
        return $this->fetch(new CreateWallTypesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Create zone: POST /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createZones(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?Overlay
    {
        return $this->fetch(new CreateZonesRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Walls.: DELETE /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteWalls(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteWallsRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Wall Types.: DELETE /network-monitoring/v1/wall-types.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteWallTypes(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteWallTypesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete zones: DELETE /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteZones(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteZonesRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Retrieves assigned devices: GET /network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned.
     *
     * @return ListResource<Data>
     */
    public function getAssociatedDevices(string $siteId): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetAssociatedDevicesRequest($siteId, $query));
    }

    /**
     * Retrieve building information: GET /network-monitoring/v1/sitemaps/{site-id}/buildings.
     *
     * @return ListResource<BuildingWithFloorsItem>
     */
    public function buildings(string $siteId): ListResource
    {
        return new ListResource($this->connector, BuildingWithFloorsItem::class, fn (Query $query) => new GetBuildingsRequest($siteId, $query));
    }

    /**
     * Retrieves device specification for all models: GET /network-monitoring/v1/catalogue-aps.
     *
     * @return ListResource<CatalogueApsItem>
     */
    public function catalogue(): ListResource
    {
        return new ListResource($this->connector, CatalogueApsItem::class, fn (Query $query) => new GetCatalogueRequest($query));
    }

    /**
     * Retrieve Floor Map Image: GET /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/image.
     *
     * @param  array<string, mixed>  $options
     */
    public function getFloorMapImage(string $siteId, string $floorId, string $raster, array $options = []): mixed
    {
        return $this->fetch(new GetFloorMapImageRequest($siteId, $floorId, $raster, $options));
    }

    /**
     * Retrieve FloorMap information: GET /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function floor(string $siteId, string $floorId, array $options = []): ?FloorMap
    {
        return $this->fetch(new GetFloorMapRequest($siteId, $floorId, $options));
    }

    /**
     * Retrieve Import Status: GET /network-monitoring/v1/sitemaps/{site-id}/import/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getImportStatus(string $siteId, string $id, array $options = []): ?ImportStatus
    {
        return $this->fetch(new GetImportStatusRequest($siteId, $id, $options));
    }

    /**
     * Retrieves placed devices over the FloorMap: GET /network-monitoring/v1/sitemaps/{site-id}/network-devices-deployed.
     *
     * @return ListResource<Data>
     */
    public function getPlacedDevices(string $siteId): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetPlacedDevicesRequest($siteId, $query));
    }

    /**
     * Retrieves placed (planned) devices: GET /network-monitoring/v1/sitemaps/{site-id}/network-devices-planned.
     *
     * @return ListResource<Data>
     */
    public function getPlacedPlannedDevices(string $siteId): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetPlacedPlannedDevicesRequest($siteId, $query));
    }

    /**
     * Site devices summary: GET /network-monitoring/v1/sitemaps-summary/{site-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function summary(string $siteId, array $options = []): ?SiteSummary
    {
        return $this->fetch(new GetSummaryRequest($siteId, $options));
    }

    /**
     * Retrieve Walls: GET /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls.
     *
     * @return ListResource<WallsItem>
     */
    public function getWalls(string $siteId, string $floorId): ListResource
    {
        return new ListResource($this->connector, WallsItem::class, fn (Query $query) => new GetWallsRequest($siteId, $floorId, $query));
    }

    /**
     * Retrieve Wall Types: GET /network-monitoring/v1/wall-types.
     *
     * @return ListResource<WallTypesItem>
     */
    public function getWallTypes(): ListResource
    {
        return new ListResource($this->connector, WallTypesItem::class, fn (Query $query) => new GetWallTypesRequest($query));
    }

    /**
     * Retrieves Zones: GET /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones.
     *
     * @return ListResource<ZonesItem>
     */
    public function getZones(string $siteId, string $floorId): ListResource
    {
        return new ListResource($this->connector, ZonesItem::class, fn (Query $query) => new GetZonesRequest($siteId, $floorId, $query));
    }

    /**
     * Import FloorPlans using zip file: POST /network-monitoring/v1/sitemaps/{site-id}/import.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function importfloors(string $siteId, array|Data $attributes = [], array $options = []): ?ImportStatus
    {
        return $this->fetch(new ImportfloorsRequest($siteId, $this->payloadOf($attributes), $options));
    }

    /**
     * Retrieve sites with or without floor configuration: GET /network-monitoring/v1/sitemaps/sites.
     *
     * @return ListResource<SiteInfo>
     */
    public function sites(): ListResource
    {
        return new ListResource($this->connector, SiteInfo::class, fn (Query $query) => new ListSitemapSitesRequest($query));
    }

    /**
     * Place devices over the FloorMap: POST /network-monitoring/v1/sitemaps/{site-id}/network-devices-deployed.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function placeDevicesOnFloor(string $siteId, array|Data $attributes = [], array $options = []): ?DeviceplacementPost
    {
        return $this->fetch(new PlaceDevicesOnFloorRequest($siteId, $this->payloadOf($attributes), $options));
    }

    /**
     * Place planned devices: POST /network-monitoring/v1/sitemaps/{site-id}/network-devices-planned.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function placePlannedDevicesOnFloor(string $siteId, array|Data $attributes = [], array $options = []): ?DeviceplacementPost
    {
        return $this->fetch(new PlacePlannedDevicesOnFloorRequest($siteId, $this->payloadOf($attributes), $options));
    }

    /**
     * Remove Building: DELETE /network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function removeBuilding(string $siteId, string $buildingId, array $options = []): mixed
    {
        return $this->fetch(new RemoveBuildingRequest($siteId, $buildingId, $options));
    }

    /**
     * Remove devices from the FloorMap: POST /network-monitoring/v1/sitemaps/{site-id}/network-devices-undeploy.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function removeDevicesOnFloor(string $siteId, array|Data $attributes = [], array $options = []): ?RemoveDevice
    {
        return $this->fetch(new RemoveDevicesOnFloorRequest($siteId, $this->payloadOf($attributes), $options));
    }

    /**
     * Remove floor from a building: DELETE /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function removefloor(string $siteId, string $floorId, array $options = []): mixed
    {
        return $this->fetch(new RemovefloorRequest($siteId, $floorId, $options));
    }

    /**
     * Remove planned devices on the FloorMap: DELETE /network-monitoring/v1/sitemaps/{site-id}/network-devices-planned.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function removePlannedDevicesOnFloor(string $siteId, array|Data $attributes = [], array $options = []): ?RemoveDevice
    {
        return $this->fetch(new RemovePlannedDevicesOnFloorRequest($siteId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Floor Image: PUT /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/image.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceimage(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?FloorMap
    {
        return $this->fetch(new ReplaceimageRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Scale FloorMap: POST /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/scale.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function scaleFloorMap(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?FloorMap
    {
        return $this->fetch(new ScaleFloorMapRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Building: PUT /network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateBuilding(string $siteId, string $buildingId, array|Data $attributes = [], array $options = []): ?Building
    {
        return $this->fetch(new UpdateBuildingRequest($siteId, $buildingId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update FloorMap: PUT /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateFloormap(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?FloorMap
    {
        return $this->fetch(new UpdateFloormapRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Walls.: PUT /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateWalls(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?Overlay
    {
        return $this->fetch(new UpdateWallsRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Wall Types: PUT /network-monitoring/v1/wall-types.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateWallTypes(array|Data $attributes = [], array $options = []): ?Overlay
    {
        return $this->fetch(new UpdateWallTypesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update zones: PUT /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateZones(string $siteId, string $floorId, array|Data $attributes = [], array $options = []): ?Overlay
    {
        return $this->fetch(new UpdateZonesRequest($siteId, $floorId, $this->payloadOf($attributes), $options));
    }
}
