<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get status of configuration backup for the given group.: GET /configuration/v1/groups/{group}/snapshots/{snapshot}/backup_status.
 */
class GetBackupStatusForSnapshotRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, protected string $snapshot, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group).'/snapshots/'.rawurlencode((string) $this->snapshot).'/backup_status';
    }
}
