<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit;

use spkm\ArubaCentral\Classic\Data\Configuration\GetGroupAutoCommitState;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get auto commit state as either On or Off at group level.: GET /configuration/v1/auto_commit_state/groups.
 *
 * Query parameters: q.
 */
class GetGroupsAutoCommitStateRequest extends ListRequest
{
    protected ?string $dto = GetGroupAutoCommitState::class;

    public string $resultKey = 'data';

    public ?int $maxLimit = 20;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/auto_commit_state/groups';
    }
}
