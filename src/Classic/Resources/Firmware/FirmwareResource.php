<?php

namespace spkm\ArubaCentral\Classic\Resources\Firmware;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Firmware\CancelUpgradeStatus;
use spkm\ArubaCentral\Classic\Data\Firmware\CommandStatus;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareComplianceResp;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareDeviceDetails;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareSwarmDetails;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareVersion;
use spkm\ArubaCentral\Classic\Data\Firmware\ImageAvailable;
use spkm\ArubaCentral\Classic\Data\Firmware\Tenant;
use spkm\ArubaCentral\Classic\Data\Firmware\UpgradeStatus;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeCustomerV2Request;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeMspV2Request;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\DeleteFirmwareComplianceMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\DeleteFirmwareComplianceMspTenantRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\DeleteFirmwareComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetDeviceFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetDevicesFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareComplianceMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareComplianceMspTenantRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareModelFamiliesListRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareVersionListRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetSwarmFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetSwarmsFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetTenantsDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\IsImageAvailableRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceMspTenantRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\UpgradeFirmwareCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\UpgradeFirmwareMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\UpgradeFirmwareRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Firmware Management API, from Aruba::firmware().
 *
 * @extends Builder<FirmwareDeviceDetails>
 */
class FirmwareResource extends Builder
{
    protected string $idField = 'serial';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, FirmwareDeviceDetails::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDevicesFirmwareDetailsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetDeviceFirmwareDetailsRequest((string) $id);
    }

    /**
     * Cancel Scheduled Upgrade: POST /firmware/v1/upgrade/cancel.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function cancelUpgrade(array|Data $attributes = [], array $options = []): ?CancelUpgradeStatus
    {
        return $this->fetch(new CancelUpgradeRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Cancel Scheduled Upgrade at Customer Level: POST /firmware/v1/msp/upgrade/customers/{customer_id}/cancel.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function cancelUpgradeCustomer(string $customerId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CancelUpgradeCustomerRequest($customerId, $this->payloadOf($attributes), $options));
    }

    /**
     * Cancel Scheduled Upgrade at Customer Level: POST /firmware/v2/msp/upgrade/customers/{customer_id}/cancel.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function cancelUpgradeCustomerV2(string $customerId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CancelUpgradeCustomerV2Request($customerId, $this->payloadOf($attributes), $options));
    }

    /**
     * Cancel Scheduled Upgrade at MSP Level: POST /firmware/v1/msp/upgrade/cancel.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function cancelUpgradeMsp(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CancelUpgradeMspRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Cancel Scheduled Upgrade at MSP Level: POST /firmware/v2/msp/upgrade/cancel.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function cancelUpgradeMspV2(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CancelUpgradeMspV2Request($this->payloadOf($attributes), $options));
    }

    /**
     * Clear Firmware Compliance Version: DELETE /firmware/v1/upgrade/compliance_version.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteFirmwareCompliance(string $deviceType, array $options = []): mixed
    {
        return $this->fetch(new DeleteFirmwareComplianceRequest($deviceType, $options));
    }

    /**
     * Clear Firmware Compliance Version for MSP Customer: DELETE /firmware/v1/msp/upgrade/compliance_version.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteFirmwareComplianceMsp(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteFirmwareComplianceMspRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Clear Firmware Compliance Version for Tenant: DELETE /firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteFirmwareComplianceMspTenant(string $customerId, string $deviceType, array $options = []): mixed
    {
        return $this->fetch(new DeleteFirmwareComplianceMspTenantRequest($customerId, $deviceType, $options));
    }

    /**
     * Get Firmware Compliance Version: GET /firmware/v1/upgrade/compliance_version.
     *
     * @param  array<string, mixed>  $options
     */
    public function getFirmwareCompliance(string $deviceType, array $options = []): ?FirmwareComplianceResp
    {
        return $this->fetch(new GetFirmwareComplianceRequest($deviceType, $options));
    }

    /**
     * Get Firmware Compliance Version for MSP Customer: GET /firmware/v1/msp/upgrade/compliance_version.
     *
     * @param  array<string, mixed>  $options
     */
    public function getFirmwareComplianceMsp(string $deviceType, array $options = []): ?FirmwareComplianceResp
    {
        return $this->fetch(new GetFirmwareComplianceMspRequest($deviceType, $options));
    }

    /**
     * Get Firmware Compliance Version for Tenant: GET /firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version.
     *
     * @param  array<string, mixed>  $options
     */
    public function getFirmwareComplianceMspTenant(string $customerId, string $deviceType, array $options = []): ?FirmwareComplianceResp
    {
        return $this->fetch(new GetFirmwareComplianceMspTenantRequest($customerId, $deviceType, $options));
    }

    /**
     * List Model Family: GET /firmware/v1/models.
     *
     * @return ListResource<Data>
     */
    public function getFirmwareModelFamiliesList(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetFirmwareModelFamiliesListRequest($query));
    }

    /**
     * Firmware Status: GET /firmware/v1/status.
     *
     * @param  array<string, mixed>  $options
     */
    public function getFirmwareStatus(array $options = []): ?CommandStatus
    {
        return $this->fetch(new GetFirmwareStatusRequest($options));
    }

    /**
     * List Firmware Version: GET /firmware/v1/versions.
     *
     * @return ListResource<FirmwareVersion>
     */
    public function getFirmwareVersionList(): ListResource
    {
        return new ListResource($this->connector, FirmwareVersion::class, fn (Query $query) => new GetFirmwareVersionListRequest($query));
    }

    /**
     * Firmware Details of Swarm: GET /firmware/v1/swarms/{swarm_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSwarmFirmwareDetails(string $swarmId, array $options = []): ?FirmwareSwarmDetails
    {
        return $this->fetch(new GetSwarmFirmwareDetailsRequest($swarmId, $options));
    }

    /**
     * List Firmware Details of Swarms: GET /firmware/v1/swarms.
     *
     * @return ListResource<FirmwareSwarmDetails>
     */
    public function getSwarmsFirmwareDetails(): ListResource
    {
        return new ListResource($this->connector, FirmwareSwarmDetails::class, fn (Query $query) => new GetSwarmsFirmwareDetailsRequest($query));
    }

    /**
     * List Firmware Details of a Tenant: GET /firmware/v1/msp/tenants/{tenant_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getTenantsDetails(string $tenantId, string $deviceType, array $options = []): ?Tenant
    {
        return $this->fetch(new GetTenantsDetailsRequest($tenantId, $deviceType, $options));
    }

    /**
     * Firmware Version: GET /firmware/v1/versions/{firmware_version}.
     *
     * @param  array<string, mixed>  $options
     */
    public function isImageAvailable(string $firmwareVersion, string $deviceType, array $options = []): ?ImageAvailable
    {
        return $this->fetch(new IsImageAvailableRequest($firmwareVersion, $deviceType, $options));
    }

    /**
     * Set Firmware Compliance Version: POST /firmware/v1/upgrade/compliance_version.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setFirmwareCompliance(array|Data $attributes = [], array $options = []): ?UpgradeStatus
    {
        return $this->fetch(new SetFirmwareComplianceRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Set Firmware Compliance Version Customer: POST /firmware/v2/upgrade/compliance_version.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setFirmwareComplianceCustomer(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetFirmwareComplianceCustomerRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Set Firmware Compliance Version for MSP customer: POST /firmware/v1/msp/upgrade/compliance_version.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setFirmwareComplianceMsp(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetFirmwareComplianceMspRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Set Firmware Compliance Version for Tenant: POST /firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setFirmwareComplianceMspTenant(string $customerId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetFirmwareComplianceMspTenantRequest($customerId, $this->payloadOf($attributes), $options));
    }

    /**
     * Firmware Upgrade: POST /firmware/v1/upgrade.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function upgradeFirmware(array|Data $attributes = [], array $options = []): ?UpgradeStatus
    {
        return $this->fetch(new UpgradeFirmwareRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Firmware Upgrade at Customer Level: POST /firmware/v1/msp/upgrade/customers/{customer_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function upgradeFirmwareCustomer(string $customerId, array|Data $attributes = [], array $options = []): ?UpgradeStatus
    {
        return $this->fetch(new UpgradeFirmwareCustomerRequest($customerId, $this->payloadOf($attributes), $options));
    }

    /**
     * Firmware Upgrade at MSP Level: POST /firmware/v1/msp/upgrade.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function upgradeFirmwareMsp(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpgradeFirmwareMspRequest($this->payloadOf($attributes), $options));
    }
}
