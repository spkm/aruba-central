<?php

namespace spkm\ArubaCentral\Classic\Data\AuditLogs;

use spkm\ArubaCentral\Data\Data;

/**
 * A AuditLog record.
 */
readonly class AuditLog extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Application ID */
        public ?string $app_id = null,
        /** Customer ID */
        public ?string $cid = null,
        /** Classification of the audit log */
        public ?string $classification = null,
        /** Customer Name */
        public ?string $cname = null,
        /** Description of the audit log */
        public ?string $description = null,
        /** Group Id */
        public ?int $gid = null,
        /** Flag indicates the availability of audit details */
        public ?bool $has_details = null,
        /** ID is unique identifier of an audit log which can be used to get audit trail details */
        public ?string $id = null,
        /** IP address of the user */
        public ?string $ip_addr = null,
        /** MSP ID */
        public ?string $msp_id = null,
        /** Target can be the Device, Group or Customer to which the log message is directed to */
        public ?string $target = null,
        /** Audit log creation time */
        public ?string $ts = null,
        /** User id of the user */
        public ?string $user = null,
    ) {}
}
