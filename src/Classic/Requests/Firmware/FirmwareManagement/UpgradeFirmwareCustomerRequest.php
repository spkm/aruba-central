<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Firmware\UpgradeStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Firmware Upgrade at Customer Level: POST /firmware/v1/msp/upgrade/customers/{customer_id}.
 *
 * Body: firmware_scheduled_at, device_type, firmware_version, reboot, exclude_groups.
 */
class UpgradeFirmwareCustomerRequest extends WriteRequest
{
    protected ?string $dto = UpgradeStatus::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $customerId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/msp/upgrade/customers/'.rawurlencode((string) $this->customerId);
    }
}
