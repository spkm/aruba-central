<?php

namespace spkm\ArubaCentral\Classic\Resources\BleBeacons;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\BleBeacons\Beacons;
use spkm\ArubaCentral\Classic\Data\BleBeacons\BleBeaconProfileItem;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\CreateBeaconProfileRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\DeleteDeviceBeaconRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\EditBeaconProfileRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\ProfileDeleteRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\RetrieveActualBeaconRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\RetrieveBeaconProfileRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\RetrieveDesireBeaconRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\UpdateDeviceBeaconRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The BleBeaconService API, from Aruba::bleBeacons().
 *
 * @extends BaseResource<Data>
 */
class BleBeaconsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete ble beacon profile: DELETE /delete_beacon_profiles/{group_name}/{profile_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function profileDelete(string $groupName, string $profileId, array $options = []): mixed
    {
        return $this->fetch(new ProfileDeleteRequest($groupName, $profileId, $options));
    }

    /**
     * Config ble beacon profile: POST /cfg_beacon_profiles/{group_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createBeaconProfile(string $groupName, string $profileName, string $configMethod, string $radioInstance, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateBeaconProfileRequest($groupName, $profileName, $configMethod, $radioInstance, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete one device beacon config: DELETE /ble_beacon/{iot_radio_mac}/{profile_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteDeviceBeacon(string $iotRadioMac, string $profileId, array $options = []): mixed
    {
        return $this->fetch(new DeleteDeviceBeaconRequest($iotRadioMac, $profileId, $options));
    }

    /**
     * Edit ble beacon profile: POST /edit_beacon_profiles/{group_name}/{profile_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function editBeaconProfile(string $groupName, string $profileId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new EditBeaconProfileRequest($groupName, $profileId, $this->payloadOf($attributes), $options));
    }

    /**
     * Retrieve ble running beacons: GET /ble_run_beacons/{group_name}.
     *
     * @return ListResource<Beacons>
     */
    public function retrieveActualBeacon(string $groupName): ListResource
    {
        return new ListResource($this->connector, Beacons::class, fn (Query $query) => new RetrieveActualBeaconRequest($groupName, $query));
    }

    /**
     * Retrieve ble beacon profiles: GET /ble_beacon_profiles.
     *
     * @return ListResource<BleBeaconProfileItem>
     */
    public function retrieveBeaconProfile(): ListResource
    {
        return new ListResource($this->connector, BleBeaconProfileItem::class, fn (Query $query) => new RetrieveBeaconProfileRequest($query));
    }

    /**
     * Retrieve ble configured beacons: GET /ble_cfg_beacons/{group_name}.
     *
     * @return ListResource<Beacons>
     */
    public function retrieveDesireBeacon(string $groupName): ListResource
    {
        return new ListResource($this->connector, Beacons::class, fn (Query $query) => new RetrieveDesireBeaconRequest($groupName, $query));
    }

    /**
     * Update one device beacon config: POST /ble_beacon/{iot_radio_mac}/{profile_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDeviceBeacon(string $iotRadioMac, string $profileId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateDeviceBeaconRequest($iotRadioMac, $profileId, $this->payloadOf($attributes), $options));
    }
}
