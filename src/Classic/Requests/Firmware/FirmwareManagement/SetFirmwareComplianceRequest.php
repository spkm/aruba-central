<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Firmware\UpgradeStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set Firmware Compliance Version: POST /firmware/v1/upgrade/compliance_version.
 *
 * Body: device_type, group, firmware_compliance_version, reboot, allow_unsupported_version.
 */
class SetFirmwareComplianceRequest extends WriteRequest
{
    protected ?string $dto = UpgradeStatus::class;

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
        return '/firmware/v1/upgrade/compliance_version';
    }
}
