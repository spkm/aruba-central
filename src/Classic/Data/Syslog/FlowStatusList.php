<?php

namespace spkm\ArubaCentral\Classic\Data\Syslog;

use spkm\ArubaCentral\Data\Data;

/**
 * A FlowStatusList record.
 */
readonly class FlowStatusList extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['Syslog_Flow_Enabled' => 'Syslog Flow Enabled', 'Syslog_Flow_Disabled' => 'Syslog Flow Disabled'];

    /**
     * @param  array<mixed>|null  $Syslog_Flow_Enabled
     * @param  array<mixed>|null  $Syslog_Flow_Disabled
     */
    public function __construct(
        public ?array $Syslog_Flow_Enabled = null,
        public ?array $Syslog_Flow_Disabled = null,
    ) {}
}
