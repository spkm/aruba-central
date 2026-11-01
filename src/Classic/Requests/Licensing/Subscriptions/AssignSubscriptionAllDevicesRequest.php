<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Standalone customer API:- Assign licenses to all devices.: POST /platform/licensing/v1/subscriptions/devices/all.
 *
 * Body: services.
 */
class AssignSubscriptionAllDevicesRequest extends WriteRequest
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
        return '/platform/licensing/v1/subscriptions/devices/all';
    }
}
