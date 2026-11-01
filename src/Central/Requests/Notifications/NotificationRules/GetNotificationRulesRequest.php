<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules;

use spkm\ArubaCentral\Central\Data\Notifications\NotificationRuleSummary;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List all notification rules: GET /network-notifications/v1/notification-rules.
 */
class GetNotificationRulesRequest extends ListRequest
{
    protected ?string $dto = NotificationRuleSummary::class;

    public ?int $maxLimit = 20;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/notification-rules';
    }
}
