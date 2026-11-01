<?php

namespace spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance;

use spkm\ArubaCentral\Central\Data\Config\ArubaFirmwareComplianceFirmwareComplianceSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read firmware policy configuration.: GET /network-config/v1alpha1/firmware-compliance.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadFirmwareComplianceRequest extends ItemRequest
{
    protected ?string $dto = ArubaFirmwareComplianceFirmwareComplianceSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/firmware-compliance';
    }
}
