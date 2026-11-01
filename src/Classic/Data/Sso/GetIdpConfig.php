<?php

namespace spkm\ArubaCentral\Classic\Data\Sso;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A GetIdpConfig record.
 */
readonly class GetIdpConfig extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $saml_idp_config
     * @param  array<mixed>|null  $attribute_mapping
     * @param  array<mixed>|null  $recovery_user
     */
    public function __construct(
        /** Name of the domain */
        public ?string $domain = null,
        /** Keys: entity_id, login_url, logout_url, signing_certificate. */
        public ?array $saml_idp_config = null,
        /** Keys: email, first_name, last_name, idle_session_timeout, hpe_ccs_attribute. */
        public ?array $attribute_mapping = null,
        /** Keys: username, recovery_email. */
        public ?array $recovery_user = null,
        /** Time when this profile was first created */
        public ?CarbonImmutable $created_at = null,
        /** Time when this profile was last updated */
        public ?CarbonImmutable $updated_at = null,
    ) {}
}
