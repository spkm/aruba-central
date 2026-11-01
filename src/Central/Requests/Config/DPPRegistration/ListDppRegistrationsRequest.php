<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DPPRegistration;

use spkm\ArubaCentral\Central\Data\Config\CdaDppReg;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List DPP registrations: GET /network-config/v1alpha1/cnac-dpp-reg.
 *
 * Query parameters: search.
 */
class ListDppRegistrationsRequest extends ListRequest
{
    protected ?string $dto = CdaDppReg::class;

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-dpp-reg';
    }
}
