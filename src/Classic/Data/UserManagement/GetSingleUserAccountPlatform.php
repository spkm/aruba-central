<?php

namespace spkm\ArubaCentral\Classic\Data\UserManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetSingleUserAccountPlatform record.
 */
readonly class GetSingleUserAccountPlatform extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $name
     * @param  array<mixed>|null  $address
     * @param  array<mixed>|null  $applications
     */
    public function __construct(
        /** name of user */
        public ?string $username = null,
        /** whether this user is system or federated user */
        public ?bool $system_user = null,
        /** Keys: firstname, lastname. */
        public ?array $name = null,
        /** Phone number. Format: +country_code-local_number */
        public ?string $phone = null,
        /** Keys: street, city, state, country, zipcode. */
        public ?array $address = null,
        public ?array $applications = null,
    ) {}
}
