<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\UserManagement;

use spkm\ArubaCentral\Classic\Data\CloudAuth\CGCertDetails;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Fetches certificate details of a user: GET /cloudauth/api/v3/user/certificate.
 *
 * Query parameters: iss, oid, sub.
 */
class FetchUserCertificatesRequest extends ListRequest
{
    protected ?string $dto = CGCertDetails::class;

    public string $resultKey = 'certificates';

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
        return '/cloudauth/api/v3/user/certificate';
    }
}
