<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnectorAssocResp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Return Pageable List of Gateways: GET /v1/iot_gateways/association.
 *
 * Query parameters: page, size, sort.
 */
class GetAllAssociationRequest extends ListRequest
{
    protected ?string $dto = ReporterConnectorAssocResp::class;

    public string $resultKey = 'content';

    public ?string $totalKey = 'totalElements';

    public string $paging = self::PAGE;

    public string $limitParameter = 'size';

    public int $firstPage = 0;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/iot_gateways/association';
    }
}
