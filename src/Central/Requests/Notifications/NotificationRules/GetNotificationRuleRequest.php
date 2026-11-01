<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules;

use spkm\ArubaCentral\Central\Data\Notifications\NotificationRule;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Retrieve a notification rule by its ID: GET /network-notifications/v1/notification-rules/{id}.
 */
class GetNotificationRuleRequest extends ItemRequest
{
    protected ?string $dto = NotificationRule::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/notification-rules/'.rawurlencode((string) $this->id);
    }
}
