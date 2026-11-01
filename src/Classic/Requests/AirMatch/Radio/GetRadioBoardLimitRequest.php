<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get board limits of a specific radio MAC: GET /feasibility/v1/board_limit/{radioMac}.
 *
 * Query options: tenant_id.
 */
class GetRadioBoardLimitRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/feasibility/v1/board_limit/'.rawurlencode((string) $this->radioMac);
    }
}
