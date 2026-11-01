<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration;

use spkm\ArubaCentral\Central\Data\Config\CdaNamedMpsk;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Named MPSK registrations: GET /network-config/v1alpha1/cnac-named-mpsk-reg.
 *
 * Query parameters: network, search, sort.
 */
class GetNamedMPSKRequest extends ListRequest
{
    protected ?string $dto = CdaNamedMpsk::class;

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
        return '/network-config/v1alpha1/cnac-named-mpsk-reg';
    }
}
