<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaFirmwareComplianceFirmwareComplianceSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\CreateFirmwareComplianceRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\DeleteFirmwareComplianceRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\ReadFirmwareComplianceRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\UpdateFirmwareComplianceRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Firmware Compliance API, from Aruba::configuration()->firmwareCompliance().
 *
 * @extends BaseResource<Data>
 */
class FirmwareComplianceResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create firmware policy configuration.: POST /network-config/v1alpha1/firmware-compliance.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createFirmwareCompliance(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreateFirmwareComplianceRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete firmware policy configuration.: DELETE /network-config/v1alpha1/firmware-compliance.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteFirmwareCompliance(array $options = []): mixed
    {
        return $this->fetch(new DeleteFirmwareComplianceRequest($options));
    }

    /**
     * Read firmware policy configuration.: GET /network-config/v1alpha1/firmware-compliance.
     *
     * @param  array<string, mixed>  $options
     */
    public function readFirmwareCompliance(array $options = []): ?ArubaFirmwareComplianceFirmwareComplianceSchemaGet
    {
        return $this->fetch(new ReadFirmwareComplianceRequest($options));
    }

    /**
     * Update firmware policy configuration.: PATCH /network-config/v1alpha1/firmware-compliance.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateFirmwareCompliance(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new UpdateFirmwareComplianceRequest($this->payloadOf($attributes), $options));
    }
}
