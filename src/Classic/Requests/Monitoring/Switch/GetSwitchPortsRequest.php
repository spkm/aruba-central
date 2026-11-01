<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\SWPortDetail;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Switch Ports Details: GET /monitoring/v1/switches/{serial}/ports.
 *
 * Query parameters: slot.
 */
class GetSwitchPortsRequest extends ListRequest
{
    protected ?string $dto = SWPortDetail::class;

    public string $resultKey = 'ports';

    public ?string $totalKey = null;

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
        return '/monitoring/v1/switches/'.rawurlencode((string) $this->serial).'/ports';
    }
}
