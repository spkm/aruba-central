<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Alerts;

use spkm\ArubaCentral\Central\Data\Notifications\Alert;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List all alerts: GET /network-notifications/v1/alerts.
 *
 * Query parameters: filter, sort.
 */
class GetAlertListRequest extends ListRequest
{
    protected ?string $dto = Alert::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/alerts';
    }
}
