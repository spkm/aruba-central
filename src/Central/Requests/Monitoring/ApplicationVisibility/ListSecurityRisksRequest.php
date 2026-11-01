<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility;

use spkm\ArubaCentral\Central\Data\Monitoring\Risk;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get security risk info for applications: GET /network-monitoring/v1/security-risks.
 *
 * Query parameters (* required): start-at*, end-at*, site-id, client-id, serial-number, ssid, user-role.
 */
class ListSecurityRisksRequest extends ListRequest
{
    protected ?string $dto = Risk::class;

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
        return '/network-monitoring/v1/security-risks';
    }
}
