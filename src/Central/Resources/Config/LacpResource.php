<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaLacpLacpSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\CreateLacpRequest;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\DeleteLacpRequest;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\ReadLacpRequest;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\UpdateLacpRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Lacp API, from Aruba::configuration()->lacp().
 *
 * @extends BaseResource<Data>
 */
class LacpResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create LACP configuration at the system level: POST /network-config/v1alpha1/lacp.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createLacp(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreateLacpRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete existing LACP configuration at the system level: DELETE /network-config/v1alpha1/lacp.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteLacp(array $options = []): mixed
    {
        return $this->fetch(new DeleteLacpRequest($options));
    }

    /**
     * Read existing configuration at the system level: GET /network-config/v1alpha1/lacp.
     *
     * @param  array<string, mixed>  $options
     */
    public function readLacp(array $options = []): ?ArubaLacpLacpSchemaGet
    {
        return $this->fetch(new ReadLacpRequest($options));
    }

    /**
     * Modify LACP configuration at the system level: PATCH /network-config/v1alpha1/lacp.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateLacp(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new UpdateLacpRequest($this->payloadOf($attributes), $options));
    }
}
