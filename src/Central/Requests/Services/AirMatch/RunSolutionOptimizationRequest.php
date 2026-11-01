<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\RunnowResponse;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Sends an optimization request to Airmatch to compute and deploy a solution: POST /network-services/v1/airmatch-solutions/run-now.
 *
 * Query options: threshold, delay, window.
 */
class RunSolutionOptimizationRequest extends ActionRequest
{
    protected ?string $dto = RunnowResponse::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $runmode, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-solutions/run-now';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['runmode' => $this->runmode, ...parent::defaultQuery()];
    }
}
