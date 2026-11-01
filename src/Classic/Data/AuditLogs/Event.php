<?php

namespace spkm\ArubaCentral\Classic\Data\AuditLogs;

use spkm\ArubaCentral\Data\Data;

/**
 * A Event record.
 */
readonly class Event extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Classification of the audit event */
        public ?string $classification = null,
        /** Description of the audit event */
        public ?string $description = null,
        /** Flag to indicate availability of event details */
        public ?bool $has_details = null,
        /** ID is unique identifier of an audit event (used in get for audit event details API) */
        public ?string $id = null,
        /** The IP address of the user */
        public ?string $ip_addr = null,
        /** Device ID(VC Name for AP or Serial Number for Switch) or group name or Service Provider Name in case of MSP */
        public ?string $target = null,
        /** Audit event creation time */
        public ?string $ts = null,
        /** Email Address of the user */
        public ?string $user = null,
    ) {}
}
