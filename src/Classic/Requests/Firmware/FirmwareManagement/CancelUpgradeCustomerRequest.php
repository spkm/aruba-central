<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Cancel Scheduled Upgrade at Customer Level: POST /firmware/v1/msp/upgrade/customers/{customer_id}/cancel.
 *
 * Body: device_type, exclude_groups.
 */
class CancelUpgradeCustomerRequest extends WriteRequest
{
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
        return '/firmware/v1/msp/upgrade/customers/'.rawurlencode((string) $this->customerId).'/cancel';
    }
}
