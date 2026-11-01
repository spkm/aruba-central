<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore;

use spkm\ArubaCentral\Classic\Data\Configuration\SnapshotInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all configuration backups for the given group.: GET /configuration/v1/groups/{group}/snapshots.
 */
class GetSnapshotsForGroupRequest extends ListRequest
{
    protected ?string $dto = SnapshotInfo::class;

    public string $resultKey = 'data';

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $group, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group).'/snapshots';
    }
}
