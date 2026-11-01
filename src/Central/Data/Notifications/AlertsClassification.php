<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A AlertsClassification record.
 */
readonly class AlertsClassification extends Data
{
    /**
     * @param  array<mixed>|null  $classificationData
     */
    public function __construct(
        /** The type of classification used. */
        public ?string $type = null,
        /** List of classification data entries. A list of ClassificationDataItem records. */
        public ?array $classificationData = null,
    ) {}
}
