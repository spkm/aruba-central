<?php

namespace spkm\ArubaCentral\Classic\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A Settings record.
 */
readonly class Settings extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $rules
     */
    public function __construct(
        /** setting_id */
        public ?string $setting_id = null,
        /** Notification Type name */
        public ?string $type = null,
        public ?array $rules = null,
        /** Active */
        public ?bool $active = null,
        /** Created Timestamp */
        public ?int $created_ts = null,
        /** Created user */
        public ?string $created_by = null,
        /** Updated Timestamp */
        public ?int $updated_ts = null,
        /** Updated user */
        public ?string $updated_by = null,
    ) {}
}
