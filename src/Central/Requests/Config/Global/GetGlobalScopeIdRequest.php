<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Global;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Global Scope Id: GET /network-config/v1/global.
 */
class GetGlobalScopeIdRequest extends ItemRequest
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
        return '/network-config/v1/global';
    }
}
