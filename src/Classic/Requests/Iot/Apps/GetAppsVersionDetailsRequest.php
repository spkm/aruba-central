<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use spkm\ArubaCentral\Classic\Data\Iot\AppVersionDetailsDTO;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get App Version Details: GET /v1/adp/apps/{app_id}/details.
 *
 * Query options: version.
 */
class GetAppsVersionDetailsRequest extends ItemRequest
{
    protected ?string $dto = AppVersionDetailsDTO::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adp/apps/'.rawurlencode((string) $this->appId).'/details';
    }
}
