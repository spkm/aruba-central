<?php

namespace spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns active configuration issues for a device.: GET /network-config/v1alpha1/config-health/active-issue.
 */
class GetActiveIssuesRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/config-health/active-issue';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['serial' => $this->serial, ...parent::defaultQuery()];
    }
}
