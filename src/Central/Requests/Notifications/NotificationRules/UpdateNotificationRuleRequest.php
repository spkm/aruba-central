<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Notifications\NotificationRule;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update a notification rule: PATCH /network-notifications/v1/notification-rules/{id}.
 *
 * Body: notificationRuleInput.
 */
class UpdateNotificationRuleRequest extends WriteRequest
{
    protected ?string $dto = NotificationRule::class;

    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/notification-rules/'.rawurlencode((string) $this->id);
    }
}
