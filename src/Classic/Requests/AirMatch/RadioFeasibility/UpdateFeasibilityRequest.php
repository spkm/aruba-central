<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Trigger update of radio feasibility: PUT /receiver/v1/radio_feasibility_update/{radio_mac}.
 *
 * Query options: tenant_id.
 */
class UpdateFeasibilityRequest extends ActionRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/receiver/v1/radio_feasibility_update/'.rawurlencode((string) $this->radioMac);
    }
}
