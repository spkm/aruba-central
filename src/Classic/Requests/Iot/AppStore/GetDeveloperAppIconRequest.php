<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Developer App Icon: GET /v1/appstore/developers/apps/{appId}/versions/{version}/icon.
 */
class GetDeveloperAppIconRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appId, protected int $version, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/developers/apps/'.rawurlencode((string) $this->appId).'/versions/'.rawurlencode((string) $this->version).'/icon';
    }
}
