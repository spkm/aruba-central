<?php

namespace spkm\ArubaCentral\Classic\Data\Msp;

use spkm\ArubaCentral\Data\Data;

/**
 * A Resource record.
 */
readonly class Resource extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $branding
     */
    public function __construct(
        /** Keys: contact_link, logo_image_url, mail_address, primary_color, product_name, provider_name, sender_email_address, service_link, terms_link. */
        public ?array $branding = null,
        /** Image details */
        public ?string $image_blob = null,
        /** Skin details */
        public ?string $skin_info = null,
    ) {}
}
