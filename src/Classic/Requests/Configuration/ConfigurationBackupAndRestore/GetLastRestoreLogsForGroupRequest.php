<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get last restore logs for the given group.: GET /configuration/v1/groups/{group}/last_restore_log.
 */
class GetLastRestoreLogsForGroupRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group).'/last_restore_log';
    }
}
