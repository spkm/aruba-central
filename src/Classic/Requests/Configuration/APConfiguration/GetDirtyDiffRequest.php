<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\DirtyDiff;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get dirty diff.: GET /configuration/v1/dirty_diff/{group_name_or_guid_or_serial_number}.
 */
class GetDirtyDiffRequest extends ListRequest
{
    protected ?string $dto = DirtyDiff::class;

    public string $resultKey = 'dirty_diff_list';

    public ?string $totalKey = null;

    public ?int $maxLimit = 20;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/dirty_diff/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
