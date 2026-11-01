<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet record.
 */
readonly class ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet extends Data
{
    protected const ALIASES = ['airpass_profile_id' => 'airpass-profile-id', 'approval_status' => 'approval-status', 'request_ts' => 'request-ts', 'response_ts' => 'response-ts', 'site_id' => 'site-id'];

    public function __construct(
        /** Unique immutable identifier for associated Air Pass auth profile. */
        public ?string $airpass_profile_id = null,
        /** Approval status from MNO for the site. One of: PENDING, APPROVED, REJECTED. */
        public ?string $approval_status = null,
        /** Mobile Network Operator (MNO) name One of: ATT, TMO, VRZ. */
        public ?string $mno = null,
        /** Name of Air Pass approval profile. */
        public ?string $name = null,
        /** Timestamp for when the approval request was generated. */
        public ?string $request_ts = null,
        /** Timestamp for when the approval response was received. */
        public ?string $response_ts = null,
        /** Site id. */
        public ?string $site_id = null,
    ) {}
}
