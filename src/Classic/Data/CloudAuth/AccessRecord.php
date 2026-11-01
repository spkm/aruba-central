<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessRecord record.
 */
readonly class AccessRecord extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $auth
     * @param  array<mixed>|null  $cert
     * @param  array<mixed>|null  $sessions
     */
    public function __construct(
        /** Keys: airpassType, apGroup, arubaLocationID, arubaRole, authCategory, authStatus, authUserID, authzStatus, carrier, certExpiry…. */
        public ?array $auth = null,
        /** CertDetails Details of device certificate issued to a user Keys: device_description, device_identifier, issuer, issuer_der, revoked_at, revoked_by, serial, subject, subject_der, valid_from…. */
        public ?array $cert = null,
        /** A list of SessionInfo records. */
        public ?array $sessions = null,
    ) {}
}
