<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous;

use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedDeploymentStats;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gets radios deployment status: GET /solver/v1/advanced_deployment_stats.
 *
 * Query options: tenant_id.
 */
class GetAdvStateDeploymentRequest extends ItemRequest
{
    protected ?string $dto = AdvancedDeploymentStats::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/solver/v1/advanced_deployment_stats';
    }
}
