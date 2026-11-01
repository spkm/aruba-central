<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Webhooks;

use spkm\ArubaCentral\Central\Data\Services\GetWebhooksItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List all Webhooks: GET /network-services/v1/webhooks.
 *
 * Query parameters: filter.
 */
class GetWebhooksRequest extends ListRequest
{
    protected ?string $dto = GetWebhooksItem::class;

    public ?string $totalKey = 'totalCount';

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
        return '/network-services/v1/webhooks';
    }
}
