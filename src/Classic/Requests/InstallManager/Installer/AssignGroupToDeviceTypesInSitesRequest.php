<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * For a given set of site names, assign Group Names for each device type: POST /v1/assign_group_to_device_types_in_sites.
 *
 * Body: groups_association, sites_association.
 */
class AssignGroupToDeviceTypesInSitesRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/assign_group_to_device_types_in_sites';
    }
}
