<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use spkm\ArubaCentral\Classic\Data\CloudAuth\NamedMPSKConfig;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Read all named MPSK: GET /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK.
 *
 * Query parameters: name, role, status, cursor, sort.
 */
class GetNamedmpskRequest extends ListRequest
{
    protected ?string $dto = NamedMPSKConfig::class;

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'cursor';

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $mpskId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v2/mpsk/'.rawurlencode((string) $this->mpskId).'/namedMPSK';
    }
}
