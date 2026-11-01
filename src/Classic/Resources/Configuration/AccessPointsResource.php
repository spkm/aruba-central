<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\APCredential;
use spkm\ArubaCentral\Classic\Data\Configuration\ApVariables;
use spkm\ArubaCentral\Classic\Data\Configuration\ArmData;
use spkm\ArubaCentral\Classic\Data\Configuration\DirtyDiff;
use spkm\ArubaCentral\Classic\Data\Configuration\RadioProfile;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\DeleteDot11aRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\DeleteDot11gRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetAllDot11aRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetAllDot11gRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetApSettingsClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetArmConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetConfigurationClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDeviceSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDirtyDiffRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDot11aRadioConfigByNameRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDot11gRadioConfigByNameRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetGroupSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetSwarmVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetSystemConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateApSettingsClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateArmConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateConfigurationClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateDeviceSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateDot11aRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateDot11gRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateGroupSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateSwarmVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateSystemConfigRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The AP Configuration API, from Aruba::configuration()->accessPoints().
 *
 * @extends BaseResource<Data>
 */
class AccessPointsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get per AP setting.: GET /configuration/v1/ap_settings_cli/{serial_number}.
     *
     * @return ListResource<Data>
     */
    public function getApSettingsClis(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetApSettingsClisRequest($serialNumber, $query));
    }

    /**
     * Get AP configuration.: GET /configuration/v1/ap_cli/{group_name_or_guid_or_serial_number}.
     *
     * @return ListResource<Data>
     */
    public function getConfigurationClis(string $groupNameOrGuidOrSerialNumber): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetConfigurationClisRequest($groupNameOrGuidOrSerialNumber, $query));
    }

    /**
     * Get dirty diff.: GET /configuration/v1/dirty_diff/{group_name_or_guid_or_serial_number}.
     *
     * @return ListResource<DirtyDiff>
     */
    public function getDirtyDiff(string $groupNameOrGuidOrSerialNumber): ListResource
    {
        return new ListResource($this->connector, DirtyDiff::class, fn (Query $query) => new GetDirtyDiffRequest($groupNameOrGuidOrSerialNumber, $query));
    }

    /**
     * Get variables config.: GET /configuration/v1/iap_variables/{group_name_or_guid_or_serial_number}.
     *
     * @return ListResource<ApVariables>
     */
    public function getSwarmVariables(string $groupNameOrGuidOrSerialNumber): ListResource
    {
        return new ListResource($this->connector, ApVariables::class, fn (Query $query) => new GetSwarmVariablesRequest($groupNameOrGuidOrSerialNumber, $query));
    }

    /**
     * Replace per AP setting.: POST /configuration/v1/ap_settings_cli/{serial_number}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateApSettingsClis(string $serialNumber, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateApSettingsClisRequest($serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace AP configuration.: POST /configuration/v1/ap_cli/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateConfigurationClis(string $groupNameOrGuidOrSerialNumber, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateConfigurationClisRequest($groupNameOrGuidOrSerialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace AP variables.: POST /configuration/v1/iap_variables/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateSwarmVariables(string $groupNameOrGuidOrSerialNumber, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateSwarmVariablesRequest($groupNameOrGuidOrSerialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Get ssh credential in device level.: GET /configuration/v1/device/ssh_credential/{serial_number_or_guid}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceSshCredential(string $serialNumberOrGuid, array $options = []): ?APCredential
    {
        return $this->fetch(new GetDeviceSshCredentialRequest($serialNumberOrGuid, $options));
    }

    /**
     * Get ssh credential in group level.: GET /configuration/v1/group/ssh_credential/{group_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupSshCredential(string $groupName, array $options = []): ?APCredential
    {
        return $this->fetch(new GetGroupSshCredentialRequest($groupName, $options));
    }

    /**
     * Update ssh credential in device level.: POST /configuration/v1/device/ssh_credential/{serial_number_or_guid}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDeviceSshCredential(string $serialNumberOrGuid, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateDeviceSshCredentialRequest($serialNumberOrGuid, $this->payloadOf($attributes), $options));
    }

    /**
     * Update ssh credential in group level.: POST /configuration/v1/group/ssh_credential/{group_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateGroupSshCredential(string $groupName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateGroupSshCredentialRequest($groupName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an existing Dot11a radio profile.: DELETE /configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteDot11aRadioProfile(string $groupNameOrGuidOrSerialNumber, string $name, array $options = []): mixed
    {
        return $this->fetch(new DeleteDot11aRadioProfileRequest($groupNameOrGuidOrSerialNumber, $name, $options));
    }

    /**
     * Delete Dot11g radio profile.: DELETE /configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteDot11gRadioProfile(string $groupNameOrGuidOrSerialNumber, string $name, array $options = []): mixed
    {
        return $this->fetch(new DeleteDot11gRadioProfileRequest($groupNameOrGuidOrSerialNumber, $name, $options));
    }

    /**
     * Get all Dot11a Radio Profiles.: GET /configuration/v1/dot11a_radio_profiles/{group_name_or_guid_or_serial_number}.
     *
     * @return ListResource<RadioProfile>
     */
    public function getAllDot11aRadioProfile(string $groupNameOrGuidOrSerialNumber): ListResource
    {
        return new ListResource($this->connector, RadioProfile::class, fn (Query $query) => new GetAllDot11aRadioProfileRequest($groupNameOrGuidOrSerialNumber, $query));
    }

    /**
     * Get all Dot11g Radio Profiles.: GET /configuration/v1/dot11g_radio_profiles/{group_name_or_guid_or_serial_number}.
     *
     * @return ListResource<RadioProfile>
     */
    public function getAllDot11gRadioProfile(string $groupNameOrGuidOrSerialNumber): ListResource
    {
        return new ListResource($this->connector, RadioProfile::class, fn (Query $query) => new GetAllDot11gRadioProfileRequest($groupNameOrGuidOrSerialNumber, $query));
    }

    /**
     * Get ARM configuration.: GET /configuration/v1/arm/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getArmConfig(string $groupNameOrGuidOrSerialNumber, array $options = []): ?ArmData
    {
        return $this->fetch(new GetArmConfigRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Get Dot11a radio profile.: GET /configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDot11aRadioConfigByName(string $groupNameOrGuidOrSerialNumber, string $name, array $options = []): ?RadioProfile
    {
        return $this->fetch(new GetDot11aRadioConfigByNameRequest($groupNameOrGuidOrSerialNumber, $name, $options));
    }

    /**
     * Get Dot11g radio profile.: GET /configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDot11gRadioConfigByName(string $groupNameOrGuidOrSerialNumber, string $name, array $options = []): ?RadioProfile
    {
        return $this->fetch(new GetDot11gRadioConfigByNameRequest($groupNameOrGuidOrSerialNumber, $name, $options));
    }

    /**
     * Update ARM configuration.: POST /configuration/v1/arm/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateArmConfig(string $groupNameOrGuidOrSerialNumber, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateArmConfigRequest($groupNameOrGuidOrSerialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Update/Create Dot11a radio profile.: POST /configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDot11aRadioProfile(string $groupNameOrGuidOrSerialNumber, string $name, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateDot11aRadioProfileRequest($groupNameOrGuidOrSerialNumber, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Update/Create Dot11g radio profile.: POST /configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDot11gRadioProfile(string $groupNameOrGuidOrSerialNumber, string $name, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateDot11gRadioProfileRequest($groupNameOrGuidOrSerialNumber, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Get System Config.: GET /configuration/v1/system_config/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSystemConfig(string $groupNameOrGuidOrSerialNumber, array $options = []): mixed
    {
        return $this->fetch(new GetSystemConfigRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Update system config.: POST /configuration/v1/system_config/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateSystemConfig(string $groupNameOrGuidOrSerialNumber, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateSystemConfigRequest($groupNameOrGuidOrSerialNumber, $this->payloadOf($attributes), $options));
    }
}
