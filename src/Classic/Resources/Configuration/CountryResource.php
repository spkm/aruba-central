<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\Configuration\NBUIGroupConfiguration\GetGroupCountryRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\NBUIGroupConfiguration\SetGroupConfigCountryCodeRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The NB UI Group Configuration API, from Aruba::configuration()->country().
 *
 * @extends BaseResource<Data>
 */
class CountryResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get country code set for group (For UI groups only, not supported for template groups).: GET /configuration/v1/{group}/country.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupCountry(string $group, array $options = []): mixed
    {
        return $this->fetch(new GetGroupCountryRequest($group, $options));
    }

    /**
     * Set country code at group level (For UI groups only, not supported for template groups). Note: IAP's need to be rebooted for changes to take effect.: PUT /configuration/v1/country.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setGroupConfigCountryCode(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetGroupConfigCountryCodeRequest($this->payloadOf($attributes), $options));
    }
}
