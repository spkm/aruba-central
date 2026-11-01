<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Telemetry;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Purge: POST /telemetry/v1/purge.
 *
 * Query options: tenant_id.
 */
class PurgeRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $purgeType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/purge';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['purge_type' => $this->purgeType, ...parent::defaultQuery()];
    }
}
