<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions;

use spkm\ArubaCentral\Classic\Data\CloudAuth\AuthRecord;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Fetch list of authentications using Cloud Identity.: GET /cloudAuth/api/v1/auth/cloud_identity/list.
 *
 * Query parameters: cursor, from_time, time_window.
 */
class ReadAuthCloudIdentityListRequest extends ListRequest
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
        return '/cloudAuth/api/v1/auth/cloud_identity/list';
    }
}
