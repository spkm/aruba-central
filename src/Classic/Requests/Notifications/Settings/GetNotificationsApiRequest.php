<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use spkm\ArubaCentral\Classic\Data\Notifications\Notification;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Notifications: GET /central/v1/notifications.
 *
 * Query parameters: customer_id, group, label, serial, site, from_timestamp, to_timestamp, severity, type, search, calculate_total, ack, fields.
 */
class GetNotificationsApiRequest extends ListRequest
{
    protected ?string $dto = Notification::class;

    public string $resultKey = 'notifications';

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications';
    }
}
