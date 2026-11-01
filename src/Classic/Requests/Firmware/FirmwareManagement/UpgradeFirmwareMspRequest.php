<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Firmware Upgrade at MSP Level: POST /firmware/v1/msp/upgrade.
 *
 * Body: firmware_scheduled_at, device_type, firmware_version, reboot, exclude_groups, exclude_customers.
 */
class UpgradeFirmwareMspRequest extends WriteRequest
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
        return '/firmware/v1/msp/upgrade';
    }
}
