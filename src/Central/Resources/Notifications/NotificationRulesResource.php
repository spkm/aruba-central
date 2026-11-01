<?php

namespace spkm\ArubaCentral\Central\Resources\Notifications;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Notifications\NotificationRuleSummary;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\CreateNotificationRuleRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\DeleteNotificationRuleRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\GetNotificationRuleRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\GetNotificationRulesRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\UpdateNotificationRuleRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Notification Rules API, from Aruba::notificationRules().
 *
 * @extends Builder<NotificationRuleSummary>
 */
class NotificationRulesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, NotificationRuleSummary::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNotificationRulesRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetNotificationRuleRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateNotificationRuleRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateNotificationRuleRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteNotificationRuleRequest((string) $id, $options);
    }
}
