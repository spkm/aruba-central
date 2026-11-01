<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Visitor;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete visitor account: DELETE /network-config/v1alpha1/cnac-visitor/{id}.
 */
class DeleteVisitorRequest extends DeleteRequest
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
        return '/network-config/v1alpha1/cnac-visitor/'.rawurlencode((string) $this->id);
    }
}
