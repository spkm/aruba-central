<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Mobility Controller: DELETE /monitoring/v2/mobility_controllers/{serial}.
 */
class DeleteMcRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/mobility_controllers/'.rawurlencode((string) $this->serial);
    }
}
