<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A site's health summary: its score and the devices, clients and reasons behind it.
 */
readonly class SiteHealthItem extends Data
{
    /**
     * @param  array<mixed>|null  $address
     * @param  array<mixed>|null  $location
     * @param  array<mixed>|null  $health
     * @param  array<mixed>|null  $alerts
     * @param  array<mixed>|null  $reasons
     * @param  array<mixed>|null  $devices
     * @param  array<mixed>|null  $clients
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Name of the site. */
        public ?string $siteName = null,
        /** Keys: street, city, state, country, zipcode. */
        public ?array $address = null,
        /** Keys: latitude, longitude. */
        public ?array $location = null,
        /** Keys: groups. */
        public ?array $health = null,
        /** Alert counts by severity. */
        public ?array $alerts = null,
        /** A list of HealthReason records. */
        public ?array $reasons = null,
        /** Device health counts by type. */
        public ?array $devices = null,
        /** Client health counts by type. */
        public ?array $clients = null,
    ) {}
}
