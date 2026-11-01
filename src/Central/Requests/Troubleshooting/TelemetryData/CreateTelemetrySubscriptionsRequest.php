<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\SubscriptionResp;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create live telemetry subscriptions on devices.: POST /network-troubleshooting/v1/telemetry-subscriptions.
 *
 * Query options: subscribe-device-type.
 *
 * Body: subscriptionReq.
 */
class CreateTelemetrySubscriptionsRequest extends WriteRequest
{
    protected ?string $dto = SubscriptionResp::class;

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
        return '/network-troubleshooting/v1/telemetry-subscriptions';
    }
}
