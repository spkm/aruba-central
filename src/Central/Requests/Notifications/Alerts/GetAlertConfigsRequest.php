<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Alerts;

use spkm\ArubaCentral\Central\Data\Notifications\AlertConfig;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List alert configurations: GET /network-notifications/v1/alert-config.
 *
 * Query parameters (* required): scope-id*, scope-type.
 */
class GetAlertConfigsRequest extends ListRequest
{
    protected ?string $dto = AlertConfig::class;

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
        return '/network-notifications/v1/alert-config';
    }
}
