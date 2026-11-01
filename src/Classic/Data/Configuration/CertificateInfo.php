<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A CertificateInfo record.
 */
readonly class CertificateInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $cert_name = null,
        /** One of: SERVER_CERT, CA_CERT, CRL, INTERMEDIATE_CA, OCSP_RESPONDER_CERT, OCSP_SIGNER_CERT, PUBLIC_CERT. */
        public ?string $cert_type = null,
        public ?string $cert_md5_checksum = null,
        public ?bool $expire = null,
        public ?string $expire_date = null,
        public ?string $cert_sh1_checksum = null,
    ) {}
}
