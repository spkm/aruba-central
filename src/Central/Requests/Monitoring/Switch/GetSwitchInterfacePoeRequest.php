<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get interface PoE for a Switch: GET /network-monitoring/v1/switches/{serial-number}/interface-poe.
 */
class GetSwitchInterfacePoeRequest extends ListRequest
{
    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/switches/'.rawurlencode((string) $this->serialNumber).'/interface-poe';
    }
}
