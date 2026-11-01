<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions;

use spkm\ArubaCentral\Classic\Data\CloudAuth\SessionRecord;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Fetch list of sessions using Aruba Air Pass.: GET /cloudAuth/api/v1/session/air_pass/list.
 *
 * Query parameters: cursor, from_time, time_window.
 */
class ReadSessionAirPassListRequest extends ListRequest
{
    protected ?string $dto = SessionRecord::class;

    public string $resultKey = 'records';

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'cursor';

    public string $cursorKey = 'cursor';

    public ?int $maxLimit = 1000;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v1/session/air_pass/list';
    }
}
