<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PolicyGroup;

use spkm\ArubaCentral\Central\Data\Config\ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read policy-group-list by name: GET /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadPolicyGroupsPolicyGroupPolicyGroupListByIDRequest extends ItemRequest
{
    protected ?string $dto = ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/'.rawurlencode((string) $this->name);
    }
}
