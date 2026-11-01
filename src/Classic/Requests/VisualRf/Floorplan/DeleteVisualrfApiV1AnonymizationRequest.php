<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Disable anonymization: DELETE /visualrf_api/v1/anonymization.
 */
class DeleteVisualrfApiV1AnonymizationRequest extends DeleteRequest
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
        return '/visualrf_api/v1/anonymization';
    }
}
