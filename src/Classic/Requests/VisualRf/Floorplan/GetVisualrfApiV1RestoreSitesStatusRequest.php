<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * get last import operation information: GET /visualrf_api/v1/restore_sites/status.
 */
class GetVisualrfApiV1RestoreSitesStatusRequest extends ItemRequest
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
        return '/visualrf_api/v1/restore_sites/status';
    }
}
