<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * It configures RSSI threshold, dwelltime threshold for visitor & RSSI threshold for passerby.: POST /presence/v3/config/thresholds.
 *
 * Query options: select_all.
 *
 * Body: body.
 */
class SetPresenceV3ThresholdsRequest extends WriteRequest
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
        return '/presence/v3/config/thresholds';
    }
}
