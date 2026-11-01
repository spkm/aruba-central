<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use spkm\ArubaCentral\Classic\Data\Configuration\ApiGroupsGetGroupsPropertiesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get properties set for groups.: GET /configuration/v1/groups/properties.
 *
 * Query parameters (* required): groups*.
 */
class GetGroupsPropertiesRequest extends ListRequest
{
    protected ?string $dto = ApiGroupsGetGroupsPropertiesItem::class;

    public string $resultKey = 'data';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/properties';
    }
}
