<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\CXPortDetail;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get ports details for CX switch: GET /monitoring/v1/cx_switches/{serial}/ports.
 *
 * Query parameters: slot.
 */
class GetCxSwitchPortsRequest extends ListRequest
{
    protected ?string $dto = CXPortDetail::class;

    public string $resultKey = 'ports';

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/cx_switches/'.rawurlencode((string) $this->serial).'/ports';
    }
}
