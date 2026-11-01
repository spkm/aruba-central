<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect;

use spkm\ArubaCentral\Classic\Data\CloudAuth\DPPClient;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Fetch list of registered clients.: GET /cloudAuth/api/v1/dpp_registration.
 *
 * Query parameters: cursor, id.
 */
class GetDppRegistrationRequest extends ListRequest
{
    protected ?string $dto = DPPClient::class;

    public string $resultKey = 'clients';

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'cursor';

    public string $cursorKey = 'cursor';

    public ?int $maxLimit = 20;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v1/dpp_registration';
    }
}
