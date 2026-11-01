<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use spkm\ArubaCentral\Classic\Data\Notifications\CountSeverity;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get notifications count by severity: GET /central/v1/notifications/count_by_severity.
 *
 * Query parameters: customer_id, group, label, serial, site, from_timestamp, to_timestamp, ack.
 */
class GetCountBySeverityApiRequest extends ListRequest
{
    protected ?string $dto = CountSeverity::class;

    public string $resultKey = 'result';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications/count_by_severity';
    }
}
