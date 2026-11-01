<?php

namespace spkm\ArubaCentral\Central\Requests\Services\GDPR;

use spkm\ArubaCentral\Central\Data\Services\ExclusionType;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get exclusion type by ID: GET /network-services/v1/gdpr-exclusion-types/{id}.
 */
class GetExclusionTypeRequest extends ItemRequest
{
    protected ?string $dto = ExclusionType::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/gdpr-exclusion-types/'.rawurlencode((string) $this->id);
    }
}
