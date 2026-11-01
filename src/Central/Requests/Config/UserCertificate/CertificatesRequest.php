<?php

namespace spkm\ArubaCentral\Central\Requests\Config\UserCertificate;

use spkm\ArubaCentral\Central\Data\Config\CdaUserCert;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List user certificates: GET /network-config/v1alpha1/cnac-certificate.
 *
 * Query parameters (* required): upn*.
 */
class CertificatesRequest extends ListRequest
{
    protected ?string $dto = CdaUserCert::class;

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
        return '/network-config/v1alpha1/cnac-certificate';
    }
}
