<?php

namespace spkm\ArubaCentral\Classic\Data\Sso;

use spkm\ArubaCentral\Data\Data;

/**
 * A SamlIdpConfig record.
 */
readonly class SamlIdpConfig extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Entity ID of the SAML configuration */
        public ?string $entity_id = null,
        /** Login URL of the IDP */
        public ?string $login_url = null,
        /** Logout url of the IDP */
        public ?string $logout_url = null,
        /** X.509 signing certificate */
        public ?string $signing_certificate = null,
    ) {}
}
