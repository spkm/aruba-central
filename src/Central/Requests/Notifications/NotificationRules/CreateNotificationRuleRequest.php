<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Notifications\NotificationRule;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a notification rule: POST /network-notifications/v1/notification-rules.
 *
 * Body: notificationRuleInput.
 */
class CreateNotificationRuleRequest extends WriteRequest
{
    protected ?string $dto = NotificationRule::class;

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
        return '/network-notifications/v1/notification-rules';
    }
}
