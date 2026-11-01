<?php

namespace spkm\ArubaCentral\Central\Requests\Config\CdaAirpassApproval;

use spkm\ArubaCentral\Central\Data\Config\ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read authentication approval configuration.: GET /network-config/v1alpha1/airpass-approval/{name}.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadAirpassApprovalApprovalByIDRequest extends ItemRequest
{
    protected ?string $dto = ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/airpass-approval/'.rawurlencode((string) $this->name);
    }
}
