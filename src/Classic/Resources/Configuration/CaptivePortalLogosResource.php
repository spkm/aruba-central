<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\CaptivePortalLogoInfo;
use spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo\DeleteCpLogoRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo\GetCpLogosRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo\UploadCpLogoRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Captive portal logo API, from Aruba::configuration()->captivePortalLogos().
 *
 * @extends BaseResource<Data>
 */
class CaptivePortalLogosResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete existing captive portal logo.: DELETE /configuration/v1/cplogo/{checksum}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteCpLogo(string $checksum, array $options = []): mixed
    {
        return $this->fetch(new DeleteCpLogoRequest($checksum, $options));
    }

    /**
     * Get Captive Portal Logos uploaded.: GET /configuration/v1/cplogo.
     *
     * @return ListResource<CaptivePortalLogoInfo>
     */
    public function getCpLogos(): ListResource
    {
        return new ListResource($this->connector, CaptivePortalLogoInfo::class, fn (Query $query) => new GetCpLogosRequest($query));
    }

    /**
     * Upload a captive portal logo.: POST /configuration/v1/cplogo.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function uploadCpLogo(array|Data $attributes = [], array $options = []): ?CaptivePortalLogoInfo
    {
        return $this->fetch(new UploadCpLogoRequest($this->payloadOf($attributes), $options));
    }
}
