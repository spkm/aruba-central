<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A site in the configuration hierarchy: a scope with an address, a time zone and a device count.
 */
readonly class Site extends Data
{
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** The site's scope identifier. */
        public ?string $scopeId = null,
        /** Name of the site. */
        public ?string $scopeName = null,
        /** Street address. */
        public ?string $address = null,
        /** City. */
        public ?string $city = null,
        /** State or county. */
        public ?string $state = null,
        /** Country. */
        public ?string $country = null,
        /** Postal code. */
        public ?string $zipcode = null,
        /** Time zone name. */
        public ?string $timezone = null,
        /** Latitude. */
        public ?string $latitude = null,
        /** Longitude. */
        public ?string $longitude = null,
        /** Site image. */
        public ?string $image = null,
        /** Number of devices assigned to the site. */
        public ?int $deviceCount = null,
        /** Identifier of the site collection the site belongs to. */
        public ?string $collectionId = null,
        /** Name of that site collection. */
        public ?string $collectionName = null,
    ) {}
}
