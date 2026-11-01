<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use spkm\ArubaCentral\Classic\Data\Webhooks\Ping;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Test for webhook notification: GET /central/v1/webhooks/{wid}/ping.
 */
class TestWebhookRequest extends ListRequest
{
    protected ?string $dto = Ping::class;

    public string $resultKey = 'result';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $wid, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/webhooks/'.rawurlencode((string) $this->wid).'/ping';
    }
}
