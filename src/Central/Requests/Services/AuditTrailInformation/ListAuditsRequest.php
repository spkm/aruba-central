<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AuditTrailInformation;

use spkm\ArubaCentral\Central\Data\Services\AuditDetail;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get audit logs belonging to the tenant.: GET /network-services/v1/audits.
 *
 * Query parameters (* required): start-at*, end-at*, filter, sort.
 */
class ListAuditsRequest extends ListRequest
{
    protected ?string $dto = AuditDetail::class;

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
        return '/network-services/v1/audits';
    }
}
