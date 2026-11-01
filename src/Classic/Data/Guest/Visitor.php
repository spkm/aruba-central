<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A Visitor record.
 */
readonly class Visitor extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $id
     * @param  array<mixed>|null  $company_name
     * @param  array<mixed>|null  $user
     * @param  array<mixed>|null  $password
     * @param  array<mixed>|null  $created_at
     * @param  array<mixed>|null  $expire_at
     */
    public function __construct(
        /** Visitor account name */
        public ?string $name = null,
        /** NA for visitor post/put method. ID of the visitor */
        public ?array $id = null,
        /** Company name of the visitor */
        public ?array $company_name = null,
        /** Keys: phone, email. */
        public ?array $user = null,
        /** Enable or disable the visitor account */
        public ?bool $is_enabled = null,
        /** Visitor account will not expire when this is set to true */
        public ?bool $valid_till_no_limit = null,
        /** Account validity in days */
        public ?int $valid_till_days = null,
        /** Account validity in hours */
        public ?int $valid_till_hours = null,
        /** Account validity in minutes */
        public ?int $valid_till_minutes = null,
        /** Flag to notify the password via email or number */
        public ?bool $notify = null,
        /** Notify to email or phone. Defualt is phone when it is provided otherwise email. One of: email, phone. */
        public ?string $notify_to = null,
        /** Password */
        public ?array $password = null,
        /** This field provides status of the account. Returns true when enabled and not expired. NA for visitor post/put method. This is optional fields. */
        public ?bool $status = null,
        /** This field indicates the created date timestamp value. It is generated while creating visitor. NA for visitor post/put method. This is optional field. */
        public ?array $created_at = null,
        /** This field indicates expiry time timestamp value. It is generated based on the valid_till value and created_at time. NA for visitor post/put method. This is… */
        public ?array $expire_at = null,
    ) {}
}
