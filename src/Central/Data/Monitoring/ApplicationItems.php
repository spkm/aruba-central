<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApplicationItems record.
 */
readonly class ApplicationItems extends Data
{
    /**
     * @param  array<mixed>|null  $categories
     * @param  array<mixed>|null  $experience
     * @param  array<mixed>|null  $destLocation
     */
    public function __construct(
        /** Resource type. */
        public ?string $type = null,
        /** The unique identifier of the application or website. */
        public ?string $id = null,
        /** The name of the application or website. */
        public ?string $name = null,
        /** List of categories that application belong to. */
        public ?array $categories = null,
        /** The experience of the application or website across the clients. */
        public ?array $experience = null,
        /** The security risk of the application. */
        public ?string $risk = null,
        /** Transmitted bytes. */
        public ?int $txBytes = null,
        /** Received bytes. */
        public ?int $rxBytes = null,
        /** String representing whether the application was allowed or blocked. */
        public ?string $state = null,
        /** The last used timestamp of the application or website. */
        public ?string $lastUsedTime = null,
        /** The TLS server version. */
        public ?string $tlsVersion = null,
        /** Date of Expiry of the certificate. */
        public ?string $certificateExpiryDate = null,
        /** Host type of the application. */
        public ?string $applicationHostType = null,
        /** Locations where the application or website is hosted. */
        public ?array $destLocation = null,
    ) {}
}
