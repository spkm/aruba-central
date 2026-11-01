<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\Errors;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * CX Switch Ports Errors: GET /monitoring/v1/cx_switches/{serial}/ports/errors.
 *
 * Query parameters: from_timestamp, to_timestamp, port, error.
 */
class GetCxPortsErrorsRequest extends ListRequest
{
    protected ?string $dto = Errors::class;

    public string $resultKey = 'samples';

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
        return '/monitoring/v1/cx_switches/'.rawurlencode((string) $this->serial).'/ports/errors';
    }
}
