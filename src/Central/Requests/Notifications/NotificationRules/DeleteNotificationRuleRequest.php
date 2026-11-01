<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a notification rule: DELETE /network-notifications/v1/notification-rules/{id}.
 */
class DeleteNotificationRuleRequest extends DeleteRequest
{
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
