<?php

namespace spkm\ArubaCentral\Central\Requests\Services\GDPR;

use spkm\ArubaCentral\Central\Data\Services\Exclusion;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a specific exclusion record: GET /network-services/v1/gdpr-exclusions/{id}.
 */
class GetExclusionRequest extends ItemRequest
{
    protected ?string $dto = Exclusion::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/gdpr-exclusions/'.rawurlencode((string) $this->id);
    }
}
