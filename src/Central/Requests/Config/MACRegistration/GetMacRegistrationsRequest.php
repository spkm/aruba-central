<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MACRegistration;

use spkm\ArubaCentral\Central\Data\Config\CdaMacReg;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List MAC registrations: GET /network-config/v1alpha1/cnac-mac-reg.
 *
 * Query parameters: search, sort.
 */
class GetMacRegistrationsRequest extends ListRequest
{
    protected ?string $dto = CdaMacReg::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-mac-reg';
    }
}
