<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\AccessRuleServices;
use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotListData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotTemplatetData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullWlanData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullWlanListData;
use spkm\ArubaCentral\Classic\Data\Configuration\ProtocolMap;
use spkm\ArubaCentral\Classic\Data\Configuration\WlanData;
use spkm\ArubaCentral\Classic\Data\Configuration\WlanListData;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CleanUpAndUpdateWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CreateHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CreateWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CreateWlanV2Request;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\DELETEDeleteWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\DeleteHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\DeleteWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetAccessRuleServicesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetAccessRuleServicesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetProtocolMapRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetWlanListRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetWlanTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotListByModeNameRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotListRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetProtocolMapRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanListRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanV2Request;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\UpdateHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\UpdateWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\UpdateWlanV2Request;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The WLAN Configuration API, from Aruba::configuration()->wlans().
 *
 * @extends BaseResource<Data>
 */
class WlansResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create a new hotspot.: POST /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createHotspot(string $groupNameOrGuidOrSerialNumber, string $hotspotName, string $modeName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateHotspotRequest($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an existing hotspot.: DELETE /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteHotspot(string $groupNameOrGuidOrSerialNumber, string $hotspotName, string $modeName, array $options = []): mixed
    {
        return $this->fetch(new DeleteHotspotRequest($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName, $options));
    }

    /**
     * Get the information of an existing hotspot.: GET /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getHotspot(string $groupNameOrGuidOrSerialNumber, string $hotspotName, string $modeName, array $options = []): ?FullHotspotData
    {
        return $this->fetch(new GetHotspotRequest($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName, $options));
    }

    /**
     * Get hotspot list of an UI group or swarm or device.: GET /configuration/full_hotspot/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getHotspotList(string $groupNameOrGuidOrSerialNumber, array $options = []): ?FullHotspotListData
    {
        return $this->fetch(new GetHotspotListRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Get hotspot list of an UI group or swarm or device with mode name: GET /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{mode_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getHotspotListByModeName(string $groupNameOrGuidOrSerialNumber, string $modeName, array $options = []): ?FullHotspotListData
    {
        return $this->fetch(new GetHotspotListByModeNameRequest($groupNameOrGuidOrSerialNumber, $modeName, $options));
    }

    /**
     * Get hotspot default configuration.: GET /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/template.
     *
     * @param  array<string, mixed>  $options
     */
    public function getHotspotTemplates(string $groupNameOrGuidOrSerialNumber, array $options = []): ?FullHotspotTemplatetData
    {
        return $this->fetch(new GetHotspotTemplatesRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Update an existing hotspot.: PUT /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateHotspot(string $groupNameOrGuidOrSerialNumber, string $hotspotName, string $modeName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateHotspotRequest($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName, $this->payloadOf($attributes), $options));
    }

    /**
     * Create a new WLAN.: POST /configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createWlan(string $groupNameOrGuidOrSerialNumber, string $wlanName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateWlanRequest($groupNameOrGuidOrSerialNumber, $wlanName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an existing WLAN.: DELETE /configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteWlan(string $groupNameOrGuidOrSerialNumber, string $wlanName, array $options = []): mixed
    {
        return $this->fetch(new DeleteWlanRequest($groupNameOrGuidOrSerialNumber, $wlanName, $options));
    }

    /**
     * Get WLAN access rule services.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}/access_rule_services.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessRuleServices(string $groupNameOrGuidOrSerialNumber, array $options = []): ?AccessRuleServices
    {
        return $this->fetch(new GetAccessRuleServicesRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Get WLAN access rule protocol map.: GET /configuration/full_wlan/{group_name_or_guid}/protocol_map.
     *
     * @param  array<string, mixed>  $options
     */
    public function getProtocolMap(string $groupNameOrGuid, array $options = []): ?ProtocolMap
    {
        return $this->fetch(new GetProtocolMapRequest($groupNameOrGuid, $options));
    }

    /**
     * Get the information of an existing WLAN.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getWlan(string $groupNameOrGuidOrSerialNumber, string $wlanName, array $options = []): ?FullWlanData
    {
        return $this->fetch(new GetWlanRequest($groupNameOrGuidOrSerialNumber, $wlanName, $options));
    }

    /**
     * Get WLAN list of an UI group.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getWlanList(string $groupNameOrGuidOrSerialNumber, array $options = []): ?FullWlanListData
    {
        return $this->fetch(new GetWlanListRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Get WLAN default configuration.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}/template.
     *
     * @param  array<string, mixed>  $options
     */
    public function getWlanTemplate(string $groupNameOrGuidOrSerialNumber, array $options = []): ?FullWlanData
    {
        return $this->fetch(new GetWlanTemplateRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Update an existing WLAN.: PUT /configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateWlan(string $groupNameOrGuidOrSerialNumber, string $wlanName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateWlanRequest($groupNameOrGuidOrSerialNumber, $wlanName, $this->payloadOf($attributes), $options));
    }

    /**
     * Update an existing WLAN and clean up unsupported fields.: PATCH /configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function cleanUpAndUpdateWlan(string $groupNameOrGuidOrSerialNumber, string $wlanName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CleanUpAndUpdateWlanRequest($groupNameOrGuidOrSerialNumber, $wlanName, $this->payloadOf($attributes), $options));
    }

    /**
     * Create a new WLAN.: POST /configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createWlanV2(string $groupNameOrGuidOrSerialNumber, string $wlanName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateWlanV2Request($groupNameOrGuidOrSerialNumber, $wlanName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an existing WLAN.: DELETE /configuration/v1/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteWlanDelete(string $groupNameOrGuidOrSerialNumber, string $wlanName, array $options = []): mixed
    {
        return $this->fetch(new DELETEDeleteWlanRequest($groupNameOrGuidOrSerialNumber, $wlanName, $options));
    }

    /**
     * Get WLAN access rule services.: GET /configuration/v1/wlan/{group_name_or_guid_or_serial_number}/access_rule_services.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessRuleServicesGet(string $groupNameOrGuidOrSerialNumber, array $options = []): ?AccessRuleServices
    {
        return $this->fetch(new GETGetAccessRuleServicesRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Get WLAN access rule protocol map.: GET /configuration/v1/wlan/{group_name_or_guid}/protocol_map.
     *
     * @param  array<string, mixed>  $options
     */
    public function getProtocolMapGet(string $groupNameOrGuid, array $options = []): ?ProtocolMap
    {
        return $this->fetch(new GETGetProtocolMapRequest($groupNameOrGuid, $options));
    }

    /**
     * Get WLAN list of an UI group.: GET /configuration/v1/wlan/{group_name_or_guid_or_serial_number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getWlanListGet(string $groupNameOrGuidOrSerialNumber, array $options = []): ?WlanListData
    {
        return $this->fetch(new GETGetWlanListRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Get WLAN default configuration.: GET /configuration/v1/wlan/{group_name_or_guid_or_serial_number}/template.
     *
     * @param  array<string, mixed>  $options
     */
    public function getWlanTemplateGet(string $groupNameOrGuidOrSerialNumber, array $options = []): ?WlanData
    {
        return $this->fetch(new GETGetWlanTemplateRequest($groupNameOrGuidOrSerialNumber, $options));
    }

    /**
     * Get the information of an existing WLAN.: GET /configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getWlanV2(string $groupNameOrGuidOrSerialNumber, string $wlanName, array $options = []): ?WlanData
    {
        return $this->fetch(new GetWlanV2Request($groupNameOrGuidOrSerialNumber, $wlanName, $options));
    }

    /**
     * Update an existing WLAN.: PUT /configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateWlanV2(string $groupNameOrGuidOrSerialNumber, string $wlanName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateWlanV2Request($groupNameOrGuidOrSerialNumber, $wlanName, $this->payloadOf($attributes), $options));
    }
}
