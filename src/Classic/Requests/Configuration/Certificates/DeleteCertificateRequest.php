<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Certificates;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete existing certificate.: DELETE /configuration/v1/certificates/{certificate}.
 */
class DeleteCertificateRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $certificate, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/certificates/'.rawurlencode((string) $this->certificate);
    }
}
