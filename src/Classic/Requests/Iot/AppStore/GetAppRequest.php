<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Classic\Data\Iot\LicenseApplication;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get App: GET /v1/appstore/apps/{appId}.
 *
 * Query options: collectorId, groupId, latestVersion.
 */
class GetAppRequest extends ItemRequest
{
    protected ?string $dto = LicenseApplication::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/apps/'.rawurlencode((string) $this->appId);
    }
}
