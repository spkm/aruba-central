<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ThreatDetail record.
 */
readonly class ThreatDetail extends Data
{
    /**
     * @param  array<mixed>|null  $mitreTags
     */
    public function __construct(
        /** The products affected by the threat. */
        public ?string $affectedProducts = null,
        /** The target of the attack threat */
        public ?string $attackTarget = null,
        /** The category of the threat. */
        public ?string $category = null,
        /** The CVE related to the signature that detected the threat. */
        public ?string $cveReference = null,
        /** The description of the signature that detected the threat. */
        public ?string $description = null,
        /** The destination city of the threat. */
        public ?string $destCity = null,
        /** The Mac address of the device. */
        public ?string $deviceMac = null,
        /** The type of the device. */
        public ?string $deviceType = null,
        /** The unique identifier of the threat. */
        public ?string $id = null,
        /** The impact of the threat. */
        public ?string $impact = null,
        /** The family that the malware belongs to. */
        public ?string $malwareFamily = null,
        /** The MITRE tags associated with the threat. A list of MitreTags records. */
        public ?array $mitreTags = null,
        /** The severity of the threat. */
        public ?string $severity = null,
        /** The signature ID of the threat. */
        public ?int $signatureId = null,
        /** The signature name of the threat. */
        public ?string $signatureName = null,
        /** The site ID to which the device belongs. */
        public ?string $siteId = null,
        /** The site name to which the device belongs. */
        public ?string $siteName = null,
        /** The source city of the threat. */
        public ?string $srcCity = null,
        /** The source IP address of the threat. */
        public ?string $srcIp = null,
        /** The summary of the threat. */
        public ?string $summary = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** The name of the user. */
        public ?string $userName = null,
        /** A monotonically increasing number indicating the number of times the resource has been updated. */
        public ?int $generation = null,
        /** The date-time (RFC 3339 UTC+0) at which the resource was created. */
        public ?CarbonImmutable $createdAt = null,
        /** The date-time (RFC 3339 UTC+0) at which the resource was last updated. */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
