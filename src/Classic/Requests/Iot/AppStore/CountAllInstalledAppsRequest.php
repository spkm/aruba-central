<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Classic\Data\Iot\AppInstalledCount;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Count all installed apps: GET /v1/appstore/apps/installed/count.
 */
class CountAllInstalledAppsRequest extends ItemRequest
{
    protected ?string $dto = AppInstalledCount::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $collectorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/apps/installed/count';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['collectorId' => $this->collectorId, ...parent::defaultQuery()];
    }
}
