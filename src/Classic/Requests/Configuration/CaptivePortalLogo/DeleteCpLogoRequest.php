<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete existing captive portal logo.: DELETE /configuration/v1/cplogo/{checksum}.
 */
class DeleteCpLogoRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $checksum, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/cplogo/'.rawurlencode((string) $this->checksum);
    }
}
