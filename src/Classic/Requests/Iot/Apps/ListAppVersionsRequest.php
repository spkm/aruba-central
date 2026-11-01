<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use spkm\ArubaCentral\Classic\Data\Iot\PageAppsVersions;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * List App Versions: GET /v1/adp/apps/{app_id}/versions.
 *
 * Query options: sort, pageNumber, pageSize.
 */
class ListAppVersionsRequest extends ItemRequest
{
    protected ?string $dto = PageAppsVersions::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adp/apps/'.rawurlencode((string) $this->appId).'/versions';
    }
}
