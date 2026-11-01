<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet record.
 */
readonly class ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet extends Data
{
    public function __construct(
        /** A user-defined description explaining the purpose or context of this policy's placement in the evaluation sequence. Maximum length is 256 characters. */
        public ?string $description = null,
        /** Unique identifier for the firewall policy. This name must reference an existing policy configured in the system. Maximum length is 256 characters. */
        public ?string $name = null,
        /** The evaluation priority of this policy in the global policy sequence. Policies are evaluated in ascending order (lower numbers are evaluated first). This value… */
        public ?int $position = null,
    ) {}
}
