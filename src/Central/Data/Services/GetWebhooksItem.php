<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A GetWebhooksItem record.
 */
readonly class GetWebhooksItem extends Data
{
    public function __construct(
        /** The unique identifier of the webhook. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Name of the monitored AP */
        public ?string $name = null,
        /** The URL to which the webhook payloads will be sent. */
        public ?string $endpoint = null,
        /** The authentication mechanism to be used for the webhook. One of: API_KEY, OIDC. */
        public ?string $authMechanism = null,
        /** Generation number of the webhook. */
        public ?int $generation = null,
        /** Time of resource creation. RFC 3339 (and ISO 8601) in UTC+0 timezone. */
        public ?CarbonImmutable $createdAt = null,
        /** Time when the resource was last updated. */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
