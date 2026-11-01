<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get App Icon: GET /v1/appstore/apps/{appId}/icon.
 */
class GetAppIconRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/apps/'.rawurlencode((string) $this->appId).'/icon';
    }
}
