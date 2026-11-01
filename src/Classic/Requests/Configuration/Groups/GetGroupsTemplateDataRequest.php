<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use spkm\ArubaCentral\Classic\Data\Configuration\ApiGroupsGetGroupsTemplateDataItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get configuration mode set per device type for groups.: GET /configuration/v2/groups/template_info.
 *
 * Query parameters (* required): groups*.
 */
class GetGroupsTemplateDataRequest extends ListRequest
{
    protected ?string $dto = ApiGroupsGetGroupsTemplateDataItem::class;

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
        return '/configuration/v2/groups/template_info';
    }
}
