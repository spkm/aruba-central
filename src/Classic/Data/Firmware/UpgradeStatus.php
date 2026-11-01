<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A UpgradeStatus record.
 */
readonly class UpgradeStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $success_list
     * @param  array<mixed>|null  $failed_list
     */
    public function __construct(
        /** Firmware upgrade initiated successfully A list of UpgradeStatusList records. */
        public ?array $success_list = null,
        /** Failed to initiate firmware upgrade A list of UpgradeStatusList records. */
        public ?array $failed_list = null,
        /** In case of bulk upgrade, firmware upgrade will be initiated in background. 'success_list' and 'failed_list' in the response will be reported empty. */
        public ?string $message = null,
    ) {}
}
