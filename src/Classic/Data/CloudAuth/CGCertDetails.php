<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A CGCertDetails record.
 */
readonly class CGCertDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $device_description = null,
        public ?string $device_identifier = null,
        public ?string $issuer = null,
        public ?string $issuer_der = null,
        public ?string $revoked_at = null,
        public ?string $revoked_by = null,
        public ?string $serial = null,
        public ?string $subject = null,
        public ?string $subject_der = null,
        public ?string $valid_from = null,
        public ?string $valid_to = null,
    ) {}
}
