<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Alerts;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Notifications\AlertAction;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set alert priority: POST /network-notifications/v1/alerts/priority.
 *
 * Body: keys, priority.
 */
class SetPriorityAlertsRequest extends WriteRequest
{
    protected ?string $dto = AlertAction::class;

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
        return '/network-notifications/v1/alerts/priority';
    }
}
