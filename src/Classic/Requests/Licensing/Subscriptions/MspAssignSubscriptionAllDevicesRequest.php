<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * MSP API:- Assign licenses to all the devices owned by tenant customers.: POST /platform/licensing/v1/msp/subscriptions/devices/all.
 *
 * Body: include_customers, exclude_customers, services.
 */
class MspAssignSubscriptionAllDevicesRequest extends WriteRequest
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
        return '/platform/licensing/v1/msp/subscriptions/devices/all';
    }
}
