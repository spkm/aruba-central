<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Telemetry;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Bootstrap: POST /telemetry/v1/bootstrap.
 *
 * Query options: tenant_id.
 */
class BootstrapRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $bootstrapType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/bootstrap';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['bootstrap_type' => $this->bootstrapType, ...parent::defaultQuery()];
    }
}
