<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set Firmware Compliance Version Customer: POST /firmware/v2/upgrade/compliance_version.
 *
 * Body: device_type, group, firmware_compliance_version, reboot, allow_unsupported_version, compliance_scheduled_at.
 */
class SetFirmwareComplianceCustomerRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v2/upgrade/compliance_version';
    }
}
