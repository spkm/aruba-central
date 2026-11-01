<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A UserPolicy record.
 */
readonly class UserPolicy extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $google_workspace
     * @param  array<mixed>|null  $microsoft_azure
     * @param  array<mixed>|null  $okta
     * @param  array<mixed>|null  $rules
     */
    public function __construct(
        /** Time when the User policy was added, added automatically. */
        public ?CarbonImmutable $added_at = null,
        /** Client roles for any user groups that are not specified in the Rules. If left empty all unspecified user group will be denied access. */
        public ?string $default_role = null,
        /** Keys: administrator_email, auth_provider_x509_cert_url, auth_uri, client_email, client_id, client_secret, client_x509_cert_url, customer_id, domain, open_id…. */
        public ?array $google_workspace = null,
        /** Keys: client_id, client_secret, tenant_id. */
        public ?array $microsoft_azure = null,
        /** Keys: apiservice_client_id, apiservice_client_secret, client_id, client_secret, tenant_id. */
        public ?array $okta = null,
        /** Organization name */
        public ?string $organization_name = null,
        /** Provisioning URL, once the User Policy is saved. Will be added automatically. */
        public ?string $provisioning_url = null,
        /** Mapping rules of User Groups to Client Roles. A list of UserPolicyRule records. */
        public ?array $rules = null,
        /** Time when the User policy was last updated, added automatically. */
        public ?CarbonImmutable $updated_at = null,
        /** WLAN network for clients that do not support Passpoint profiles. Empty WLAN network means wired-only provisioning. */
        public ?string $wlan_network = null,
    ) {}
}
