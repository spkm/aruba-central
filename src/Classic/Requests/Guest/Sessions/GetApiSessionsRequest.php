<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Sessions;

use spkm\ArubaCentral\Classic\Data\Guest\Session;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all sessions of a ssid: GET /guest/v1/portals/{portal_id}/sessions.
 *
 * Query parameters (* required): sort, essid_name*, ssid_name, filter_by, filter_value.
 */
class GetApiSessionsRequest extends ListRequest
{
    protected ?string $dto = Session::class;

    public string $resultKey = 'sessions';

    public ?string $totalKey = null;

    public array $defaults = ['limit' => 10, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $portalId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId).'/sessions';
    }
}
