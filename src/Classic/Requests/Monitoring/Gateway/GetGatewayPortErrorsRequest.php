<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\GatewayPortErrors;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway Port Errors: GET /monitoring/v1/gateways/{serial}/ports/errors.
 *
 * Query parameters (* required): port*, interval, from_timestamp, to_timestamp.
 */
class GetGatewayPortErrorsRequest extends ListRequest
{
    protected ?string $dto = GatewayPortErrors::class;

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
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/ports/errors';
    }
}
