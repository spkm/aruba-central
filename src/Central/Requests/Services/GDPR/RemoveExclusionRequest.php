<?php

namespace spkm\ArubaCentral\Central\Requests\Services\GDPR;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Remove an exclusion record: DELETE /network-services/v1/gdpr-exclusions/{id}.
 */
class RemoveExclusionRequest extends DeleteRequest
{
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
