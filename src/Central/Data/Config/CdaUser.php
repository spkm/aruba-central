<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaUser record.
 */
readonly class CdaUser extends Data
{
    public function __construct(
        /** Authentication source for the account */
        public ?string $authSource = null,
        /** The company name to associate with this account */
        public ?string $companyName = null,
        /** Creation time of the user account. */
        public ?string $createdAt = null,
        /** User display name */
        public ?string $displayName = null,
        /** User email address */
        public ?string $email = null,
        /** Enable or disable the account */
        public ?bool $enable = null,
        /** The date and time at which the system should expire the account by disabling it */
        public ?string $expireAt = null,
        /** ID of the user. */
        public ?string $id = null,
        /** Modification time of the user account. */
        public ?string $modifiedAt = null,
        /** User name */
        public ?string $name = null,
        /** User phone number in international format (ITU E.164 with "+" prefix; e.g. +14082345678) */
        public ?string $phone = null,
        /** Status for the account */
        public ?string $status = null,
    ) {}
}
