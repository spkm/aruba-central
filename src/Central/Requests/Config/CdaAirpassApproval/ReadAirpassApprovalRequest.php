<?php

namespace spkm\ArubaCentral\Central\Requests\Config\CdaAirpassApproval;

use spkm\ArubaCentral\Central\Data\Config\ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Read Air Pass profile configuration(s).: GET /network-config/v1alpha1/airpass-approval.
 *
 * Query parameters: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadAirpassApprovalRequest extends ListRequest
{
    protected ?string $dto = ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem::class;

    public string $resultKey = 'approval';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/airpass-approval';
    }
}
