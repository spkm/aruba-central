<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaUserCert record.
 */
readonly class CdaUserCert extends Data
{
    public function __construct(
        /** A short description of the device this certificate was issued to. */
        public ?string $deviceDescription = null,
        /** Unique identifier for the device this certificate was issued to. */
        public ?string $deviceIdentifier = null,
        /** ID of the certificate. */
        public ?string $id = null,
        /** User certificate issuer name. */
        public ?string $issuer = null,
        /** User certificate issuer in DER form, hex encoded. */
        public ?string $issuerDer = null,
        /** Time when the user certificate was revoked */
        public ?string $revokedAt = null,
        /** User certificate revoked by whom. */
        public ?string $revokedBy = null,
        /** User certificate serial number. */
        public ?string $serial = null,
        /** User certificate subject name. */
        public ?string $subject = null,
        /** User certificate subject in DER form, hex encoded. */
        public ?string $subjectDer = null,
        /** User certificate valid from. */
        public ?string $validFrom = null,
        /** User certificate valid till. */
        public ?string $validTo = null,
    ) {}
}
