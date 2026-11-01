<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use spkm\ArubaCentral\Classic\Data\Webhooks\Webhooks;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List webhooks: GET /central/v1/webhooks.
 */
class GetWebhooksApiRequest extends ListRequest
{
    protected ?string $dto = Webhooks::class;

    public string $resultKey = 'settings';

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
        return '/central/v1/webhooks';
    }
}
