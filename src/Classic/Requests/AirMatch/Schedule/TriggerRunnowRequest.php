<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * RMQ message triggers a runnow job for a certain tenant: POST /scheduler/v1/runnow.
 *
 * Query options: tenant_id.
 */
class TriggerRunnowRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $runnowType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/scheduler/v1/runnow';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['runnow_type' => $this->runnowType, ...parent::defaultQuery()];
    }
}
