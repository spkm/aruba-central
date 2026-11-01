<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Firmware\CancelUpgradeStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Cancel Scheduled Upgrade: POST /firmware/v1/upgrade/cancel.
 *
 * Body: swarm_id, serial, device_type, group.
 */
class CancelUpgradeRequest extends WriteRequest
{
    protected ?string $dto = CancelUpgradeStatus::class;

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
        return '/firmware/v1/upgrade/cancel';
    }
}
