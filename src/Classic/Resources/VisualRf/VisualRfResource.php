<?php

namespace spkm\ArubaCentral\Classic\Resources\VisualRf;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\VisualRf\AccessPointObj;
use spkm\ArubaCentral\Classic\Data\VisualRf\AnonymizationGetResponse;
use spkm\ArubaCentral\Classic\Data\VisualRf\AnonymizationPostResponse;
use spkm\ArubaCentral\Classic\Data\VisualRf\BuildingListFloor;
use spkm\ArubaCentral\Classic\Data\VisualRf\Campus;
use spkm\ArubaCentral\Classic\Data\VisualRf\CampusListBuilding;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorImage;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListAccessPoint;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListClientLocation;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListRogueLocation;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorObj;
use spkm\ArubaCentral\Classic\Data\VisualRf\GeofenceRepsonseEnabled;
use spkm\ArubaCentral\Classic\Data\VisualRf\LocationObj;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\DeleteVisualrfApiV1AnonymizationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\DeleteVisualrfApiV1GeofenceRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1AccessPointLocationApIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1AnonymizationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1BuildingBuildingIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1CampusCampusIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1CampusRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1ClientLocationMacaddrRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdAccessPointLocationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdClientLocationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdImageRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdRogueLocationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1GeofenceRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1RestoreSitesStatusRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1RogueLocationMacaddrRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\PostVisualrfApiV1AnonymizationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\PostVisualrfApiV1GeofenceRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\PostVisualrfApiV1RestoreSitesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Floorplan API, from Aruba::visualRf().
 *
 * @extends BaseResource<Data>
 */
class VisualRfResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Disable anonymization: DELETE /visualrf_api/v1/anonymization.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteVisualrfApiV1Anonymization(array $options = []): mixed
    {
        return $this->fetch(new DeleteVisualrfApiV1AnonymizationRequest($options));
    }

    /**
     * Disable geofence: DELETE /visualrf_api/v1/geofence.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteVisualrfApiV1Geofence(array $options = []): mixed
    {
        return $this->fetch(new DeleteVisualrfApiV1GeofenceRequest($options));
    }

    /**
     * Get location of a specific access point: GET /visualrf_api/v1/access_point_location/{ap_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1AccessPointLocationApId(string $apId, array $options = []): ?AccessPointObj
    {
        return $this->fetch(new GetVisualrfApiV1AccessPointLocationApIdRequest($apId, $options));
    }

    /**
     * Get status of anonymization: GET /visualrf_api/v1/anonymization.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1Anonymization(array $options = []): ?AnonymizationGetResponse
    {
        return $this->fetch(new GetVisualrfApiV1AnonymizationRequest($options));
    }

    /**
     * Get a specific building and its floors: GET /visualrf_api/v1/building/{building_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1BuildingBuildingId(string $buildingId, array $options = []): ?BuildingListFloor
    {
        return $this->fetch(new GetVisualrfApiV1BuildingBuildingIdRequest($buildingId, $options));
    }

    /**
     * Get a specific campus and its buildings: GET /visualrf_api/v1/campus/{campus_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1CampusCampusId(string $campusId, array $options = []): ?CampusListBuilding
    {
        return $this->fetch(new GetVisualrfApiV1CampusCampusIdRequest($campusId, $options));
    }

    /**
     * Get list of all campuses: GET /visualrf_api/v1/campus.
     *
     * @return ListResource<Campus>
     */
    public function getVisualrfApiV1Campus(): ListResource
    {
        return new ListResource($this->connector, Campus::class, fn (Query $query) => new GetVisualrfApiV1CampusRequest($query));
    }

    /**
     * Get location of a specific client: GET /visualrf_api/v1/client_location/{macaddr}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1ClientLocationMacaddr(string $macaddr, array $options = []): ?LocationObj
    {
        return $this->fetch(new GetVisualrfApiV1ClientLocationMacaddrRequest($macaddr, $options));
    }

    /**
     * Get a specific floor and location of all its access points: GET /visualrf_api/v1/floor/{floor_id}/access_point_location.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1FloorFloorIdAccessPointLocation(string $floorId, array $options = []): ?FloorListAccessPoint
    {
        return $this->fetch(new GetVisualrfApiV1FloorFloorIdAccessPointLocationRequest($floorId, $options));
    }

    /**
     * Get a specific floor and location of all its clients: GET /visualrf_api/v1/floor/{floor_id}/client_location.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1FloorFloorIdClientLocation(string $floorId, array $options = []): ?FloorListClientLocation
    {
        return $this->fetch(new GetVisualrfApiV1FloorFloorIdClientLocationRequest($floorId, $options));
    }

    /**
     * Get background image of a specific floor: GET /visualrf_api/v1/floor/{floor_id}/image.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1FloorFloorIdImage(string $floorId, array $options = []): ?FloorImage
    {
        return $this->fetch(new GetVisualrfApiV1FloorFloorIdImageRequest($floorId, $options));
    }

    /**
     * Get a specific floor and location of all its rogue access points: GET /visualrf_api/v1/floor/{floor_id}/rogue_location.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1FloorFloorIdRogueLocation(string $floorId, array $options = []): ?FloorListRogueLocation
    {
        return $this->fetch(new GetVisualrfApiV1FloorFloorIdRogueLocationRequest($floorId, $options));
    }

    /**
     * Get details of a specific floor: GET /visualrf_api/v1/floor/{floor_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1FloorFloorId(string $floorId, array $options = []): ?FloorObj
    {
        return $this->fetch(new GetVisualrfApiV1FloorFloorIdRequest($floorId, $options));
    }

    /**
     * Get status of geofence: GET /visualrf_api/v1/geofence.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1Geofence(array $options = []): ?GeofenceRepsonseEnabled
    {
        return $this->fetch(new GetVisualrfApiV1GeofenceRequest($options));
    }

    /**
     * get last import operation information: GET /visualrf_api/v1/restore_sites/status.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1RestoreSitesStatus(array $options = []): mixed
    {
        return $this->fetch(new GetVisualrfApiV1RestoreSitesStatusRequest($options));
    }

    /**
     * Get location of a specific rogue access point: GET /visualrf_api/v1/rogue_location/{macaddr}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisualrfApiV1RogueLocationMacaddr(string $macaddr, array $options = []): ?LocationObj
    {
        return $this->fetch(new GetVisualrfApiV1RogueLocationMacaddrRequest($macaddr, $options));
    }

    /**
     * Enable anonymization: POST /visualrf_api/v1/anonymization.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postVisualrfApiV1Anonymization(array|Data $attributes = [], array $options = []): ?AnonymizationPostResponse
    {
        return $this->fetch(new PostVisualrfApiV1AnonymizationRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Enable geofence: POST /visualrf_api/v1/geofence.
     *
     * @param  array<string, mixed>  $options
     */
    public function postVisualrfApiV1Geofence(array $options = []): ?GeofenceRepsonseEnabled
    {
        return $this->fetch(new PostVisualrfApiV1GeofenceRequest($options));
    }

    /**
     * create floorplans using zip file (supported files are zip and .esx): POST /visualrf_api/v1/restore_sites.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postVisualrfApiV1RestoreSites(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PostVisualrfApiV1RestoreSitesRequest($this->payloadOf($attributes), $options));
    }
}
