<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Configuration\CaptivePortalLogoInfo;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Upload a captive portal logo.: POST /configuration/v1/cplogo.
 *
 * Body: cp_logo_filename, cp_logo_data.
 */
class UploadCpLogoRequest extends WriteRequest
{
    protected ?string $dto = CaptivePortalLogoInfo::class;

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
        return '/configuration/v1/cplogo';
    }
}
