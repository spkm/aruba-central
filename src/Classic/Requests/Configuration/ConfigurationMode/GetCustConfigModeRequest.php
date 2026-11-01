<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode;

use spkm\ArubaCentral\Classic\Data\Configuration\CustConfigMode;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get configuration mode as either Monitor or Managed mode at customer level.: GET /configuration/v1/mode.
 */
class GetCustConfigModeRequest extends ListRequest
{
    protected ?string $dto = CustConfigMode::class;

    public string $resultKey = 'data';

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
        return '/configuration/v1/mode';
    }
}
