<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PolicyGroup;

use spkm\ArubaCentral\Central\Data\Config\ArubaPolicyGroupPolicyGroupsSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read policy-groups: GET /network-config/v1alpha1/policy-groups.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadPolicyGroupsRequest extends ItemRequest
{
    protected ?string $dto = ArubaPolicyGroupPolicyGroupsSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/policy-groups';
    }
}
