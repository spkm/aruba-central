<?php

namespace spkm\ArubaCentral\Central\Requests\Config\UserCertificate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaRevokeCerts;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Revoke user certificates: POST /network-config/v1alpha1/cnac-certificate/revoke.
 *
 * Body: input.
 */
class RevokeCertificatesRequest extends WriteRequest
{
    protected ?string $dto = CdaRevokeCerts::class;

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
        return '/network-config/v1alpha1/cnac-certificate/revoke';
    }
}
