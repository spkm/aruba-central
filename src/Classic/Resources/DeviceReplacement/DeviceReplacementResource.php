<?php

namespace spkm\ArubaCentral\Classic\Resources\DeviceReplacement;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\CancelReplacement;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\ComplianceCheck;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DeviceCount;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DeviceStatus;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DevicesUnderReplacement;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\InitiateReplacement;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\MspCustomers;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\MspReplacementDetails;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\OfflineDevicesItem;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\RequestReplacement;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleCancelReplacementRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleCheckComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleDevicesCountRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleDevicesUnderReplacementRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleGetDeviceStatusRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleGetOfflineDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleInitiateReplacementRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleMspCustomersRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleMspDevicesCountRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleMspReplacementDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleReplaceRequestRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Cancel Replacement API, from Aruba::deviceReplacement().
 *
 * @extends BaseResource<Data>
 */
class DeviceReplacementResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * To cancel device replacement: POST /v1/cancel_replacement.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function handleCancelReplacement(array|Data $attributes = [], array $options = []): ?CancelReplacement
    {
        return $this->fetch(new HandleCancelReplacementRequest($this->payloadOf($attributes), $options));
    }

    /**
     * To check compliance: POST /v1/check_compliance.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function handleCheckCompliance(array|Data $attributes = [], array $options = []): ?ComplianceCheck
    {
        return $this->fetch(new HandleCheckComplianceRequest($this->payloadOf($attributes), $options));
    }

    /**
     * To get device count for a Tenant/Standalone account: GET /v1/device_count.
     *
     * @param  array<string, mixed>  $options
     */
    public function handleDevicesCount(array $options = []): ?DeviceCount
    {
        return $this->fetch(new HandleDevicesCountRequest($options));
    }

    /**
     * To get devices under replacement: GET /v1/devices.
     *
     * @param  array<string, mixed>  $options
     */
    public function handleDevicesUnderReplacement(array $options = []): ?DevicesUnderReplacement
    {
        return $this->fetch(new HandleDevicesUnderReplacementRequest($options));
    }

    /**
     * To check device status: GET /v1/device_status.
     *
     * @param  array<string, mixed>  $options
     */
    public function handleGetDeviceStatus(string $deviceSerial, array $options = []): ?DeviceStatus
    {
        return $this->fetch(new HandleGetDeviceStatusRequest($deviceSerial, $options));
    }

    /**
     * Get all offline devices: GET /v1/offline_devices.
     *
     * @return ListResource<OfflineDevicesItem>
     */
    public function handleGetOfflineDevices(): ListResource
    {
        return new ListResource($this->connector, OfflineDevicesItem::class, fn (Query $query) => new HandleGetOfflineDevicesRequest($query));
    }

    /**
     * To initiate device replacement: POST /v1/initiate_replacement.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function handleInitiateReplacement(array|Data $attributes = [], array $options = []): ?InitiateReplacement
    {
        return $this->fetch(new HandleInitiateReplacementRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get all tenants under that MSP account: GET /v1/msp_customers.
     *
     * @param  array<string, mixed>  $options
     */
    public function handleMspCustomers(array $options = []): ?MspCustomers
    {
        return $this->fetch(new HandleMspCustomersRequest($options));
    }

    /**
     * Count of devices under replacement for a MSP customer: GET /v1/msp_replacement_count.
     *
     * @param  array<string, mixed>  $options
     */
    public function handleMspDevicesCount(array $options = []): ?DeviceCount
    {
        return $this->fetch(new HandleMspDevicesCountRequest($options));
    }

    /**
     * Get replacement details of all tenants under that MSP account: GET /v1/msp_replacement_details.
     *
     * @param  array<string, mixed>  $options
     */
    public function handleMspReplacementDetails(array $options = []): ?MspReplacementDetails
    {
        return $this->fetch(new HandleMspReplacementDetailsRequest($options));
    }

    /**
     * To request device replacement: POST /v1/request_replacement.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function handleReplaceRequest(array|Data $attributes = [], array $options = []): ?RequestReplacement
    {
        return $this->fetch(new HandleReplaceRequestRequest($this->payloadOf($attributes), $options));
    }
}
