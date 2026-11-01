<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration;

use spkm\ArubaCentral\Classic\Data\CloudAuth\ClientEntry;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Fetch list of mac registrations.: GET /cloudauth/api/v3/client/mac/registration.
 *
 * Query parameters: cursor, mac_prefix, display_name_prefix, search, sort.
 */
class GetRegistrationRequest extends ListRequest
{
    protected ?string $dto = ClientEntry::class;

    public string $resultKey = 'clients';

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'cursor';

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
        return '/cloudauth/api/v3/client/mac/registration';
    }
}
