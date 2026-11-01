<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaConfigAssignmentConfigAssignmentsSchemaGETItem record.
 */
readonly class ArubaConfigAssignmentConfigAssignmentsSchemaGETItem extends Data
{
    protected const ALIASES = ['device_function' => 'device-function', 'profile_instance' => 'profile-instance', 'profile_type' => 'profile-type', 'scope_id' => 'scope-id', 'scope_name' => 'scope-name', 'scope_type' => 'scope-type'];

    public function __construct(
        /** This is the device function identifier. For example: BRANCH_GW, ACCESS_SWITCH, CAMPUS_AP, etc. One of: MOBILITY_GW, BRANCH_GW, VPNC, CAMPUS_AP, MICROBRANCH_AP, ACCESS_SWITCH, ALL, SERVICE_PERSONA, BRIDGE, IOT, HYBRID_NAC, CORE_SWITCH…. */
        public ?string $device_function = null,
        /** Instance of the profile. Example: If a config is a role called Role1, the profile instance would be Role1 */
        public ?string $profile_instance = null,
        /** Type of the profile. Example: If a config is a role called Role1, the profile type would be roles. Similarly for a policy, it would be policies */
        public ?string $profile_type = null,
        /** Scope id is an identifier for the scope */
        public ?string $scope_id = null,
        /** Name of the scope */
        public ?string $scope_name = null,
        /** Type of the scope. Example: Site, Device, etc. */
        public ?string $scope_type = null,
    ) {}
}
