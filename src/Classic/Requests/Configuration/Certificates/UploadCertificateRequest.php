<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Certificates;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Configuration\CertificateInfo;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Upload a certificate.: POST /configuration/v1/certificates.
 *
 * Body: cert_name, cert_type, cert_format, passphrase, cert_data.
 */
class UploadCertificateRequest extends WriteRequest
{
    protected ?string $dto = CertificateInfo::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/certificates';
    }
}
