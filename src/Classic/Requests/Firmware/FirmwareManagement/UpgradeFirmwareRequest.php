<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Firmware\UpgradeStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Firmware Upgrade: POST /firmware/v1/upgrade.
 *
 * Body: firmware_scheduled_at, swarm_id, serial, group, device_type, firmware_version, reboot, model, forced.
 */
class UpgradeFirmwareRequest extends WriteRequest
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
        return '/firmware/v1/upgrade';
    }
}
