<?php

namespace spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete airgroup-system: DELETE /network-config/v1alpha1/airgroup-system.
 *
 * Query options: object-type, scope-id, device-function.
 */
class DeleteAirgroupSystemRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/airgroup-system';
    }
}
