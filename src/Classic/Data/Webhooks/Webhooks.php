<?php

namespace spkm\ArubaCentral\Classic\Data\Webhooks;

use spkm\ArubaCentral\Data\Data;

/**
 * A Webhooks record.
 */
readonly class Webhooks extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $urls
     * @param  array<mixed>|null  $secure_token
     */
    public function __construct(
        /** id of the webhook */
        public ?string $wid = null,
        /** Webhook name */
        public ?string $name = null,
        /** Updated Timestamp */
        public ?int $updated_ts = null,
        /** List of webhook urls */
        public ?array $urls = null,
        /** Keys: token, ts. */
        public ?array $secure_token = null,
    ) {}
}
