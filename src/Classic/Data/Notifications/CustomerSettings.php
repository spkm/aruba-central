<?php

namespace spkm\ArubaCentral\Classic\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A CustomerSettings record.
 */
readonly class CustomerSettings extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $muted_sites
     * @param  array<mixed>|null  $site_emails
     * @param  array<mixed>|null  $default_recipients_email_list
     */
    public function __construct(
        /** Sites muted for alert */
        public ?array $muted_sites = null,
        /** A list of SiteEmail records. */
        public ?array $site_emails = null,
        /** deafult recipients email list */
        public ?array $default_recipients_email_list = null,
        /** Subject line to use for email notifications */
        public ?string $email_subject_line_template = null,
    ) {}
}
