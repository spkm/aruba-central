<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions;

use spkm\ArubaCentral\Classic\Data\CloudAuth\AuthRecord;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Fetch list of authentications using Aruba Air Pass.: GET /cloudAuth/api/v1/auth/air_pass/list.
 *
 * Query parameters: cursor, from_time, time_window.
 */
class ReadAuthAirPassListRequest extends ListRequest
{
    protected ?string $dto = AuthRecord::class;

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
        return '/cloudAuth/api/v1/auth/air_pass/list';
    }
}
