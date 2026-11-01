<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\StartApRangingScan;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Start an AP ranging scan (USE WITH CAUTION): POST /network-services/v1/ap-ranging-scans.
 *
 * Query options: dry-run.
 *
 * Body: scanStartTime.
 */
class StartApRangingScanRequest extends WriteRequest
{
    protected ?string $dto = StartApRangingScan::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $floorId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/ap-ranging-scans';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['site-id' => $this->siteId, 'floor-id' => $this->floorId, ...parent::defaultQuery()];
    }
}
