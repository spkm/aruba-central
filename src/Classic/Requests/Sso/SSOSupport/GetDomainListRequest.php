<?php

namespace spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport;

use spkm\ArubaCentral\Classic\Data\Sso\DomainsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get domain list: GET /platform/aaa_config/v2/authentication/idp/source.
 */
class GetDomainListRequest extends ListRequest
{
    protected ?string $dto = DomainsItem::class;

    public string $resultKey = 'domains';

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
        return '/platform/aaa_config/v2/authentication/idp/source';
    }
}
