<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Classic\Data\CloudConnect\ConfigSummaryItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get config summary for configured groups.: GET /cloud-connect/config-summary.
 *
 * Query parameters (* required): group*.
 */
class GetArubaCloudVpnConnectConfigSummaryRequest extends ListRequest
{
    protected ?string $dto = ConfigSummaryItem::class;

    public string $resultKey = 'branch_topologies';

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
        return '/cloud-connect/config-summary';
    }
}
