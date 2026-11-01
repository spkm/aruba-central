<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Certificates;

use spkm\ArubaCentral\Classic\Data\Configuration\CertificateInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get Certificates details uploaded.: GET /configuration/v1/certificates.
 *
 * Query parameters: q.
 */
class GetCertificatesRequest extends ListRequest
{
    protected ?string $dto = CertificateInfo::class;

    public string $resultKey = 'data';

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
        return '/configuration/v1/certificates';
    }
}
