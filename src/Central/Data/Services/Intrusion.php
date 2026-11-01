<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A wireless intrusion WIDS detected.
 */
readonly class Intrusion extends Data
{
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** When the record was created. */
        public ?CarbonImmutable $createdAt = null,
        /** Identifier of the site. */
        public ?string $siteId = null,
        /** Name of the site. */
        public ?string $siteName = null,
        /** The access point that detected the intrusion. */
        public ?string $detectingAp = null,
        /** Intrusion category. */
        public ?string $category = null,
        /** Signature or event type. */
        public ?string $eventType = null,
        /** Severity level. */
        public ?string $level = null,
        /** When the intrusion was detected. */
        public ?CarbonImmutable $eventTime = null,
        /** Radio band it was seen on. */
        public ?string $radioBand = null,
        /** Description of the intrusion. */
        public ?string $description = null,
        /** MAC address of the offending station. */
        public ?string $stationMac = null,
    ) {}
}
