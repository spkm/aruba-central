<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use spkm\ArubaCentral\Classic\Data\Guest\GuestWlan;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all guest wlans: GET /guest/v1/wlans.
 */
class GetApiGuestWlansRequest extends ListRequest
{
    protected ?string $dto = GuestWlan::class;

    public string $resultKey = 'wlans';

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
        return '/guest/v1/wlans';
    }
}
