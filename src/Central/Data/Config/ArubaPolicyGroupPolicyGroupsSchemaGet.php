<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaPolicyGroupPolicyGroupsSchemaGet record.
 */
readonly class ArubaPolicyGroupPolicyGroupsSchemaGet extends Data
{
    protected const ALIASES = ['policy_group' => 'policy-group'];

    /**
     * @param  array<mixed>|null  $policy_group
     */
    public function __construct(
        /** Configuration for the ordered list of firewall policies and their evaluation priorities. Keys: policy-group-list. */
        public ?array $policy_group = null,
    ) {}
}
