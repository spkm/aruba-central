<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AuditTrailInformation;

use spkm\ArubaCentral\Central\Data\Services\AuditDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Audit log based on the audit id.: GET /network-services/v1/audits/{id}.
 */
class GetAuditByIdRequest extends ItemRequest
{
    protected ?string $dto = AuditDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/audits/'.rawurlencode((string) $this->id);
    }
}
