<?php

namespace spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR;

use spkm\ArubaCentral\Classic\Data\Gdpr\GdprClient;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List gdprs opt out MAC clients for this customer: GET /gdpr/v1/opt_out_clients.
 */
class GetGdprsApiRequest extends ListRequest
{
    protected ?string $dto = GdprClient::class;

    public string $resultKey = 'GDPR Client';

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
        return '/gdpr/v1/opt_out_clients';
    }
}
