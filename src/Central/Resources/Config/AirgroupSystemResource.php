<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaAirgroupSystemAirgroupSystemSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\CreateAirgroupSystemRequest;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\DeleteAirgroupSystemRequest;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\ReadAirgroupSystemRequest;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\UpdateAirgroupSystemRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Airgroup System API, from Aruba::configuration()->airgroupSystem().
 *
 * @extends BaseResource<Data>
 */
class AirgroupSystemResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create new system configuration: POST /network-config/v1alpha1/airgroup-system.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createAirgroupSystem(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreateAirgroupSystemRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete airgroup-system: DELETE /network-config/v1alpha1/airgroup-system.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteAirgroupSystem(array $options = []): mixed
    {
        return $this->fetch(new DeleteAirgroupSystemRequest($options));
    }

    /**
     * Read existing system configuration: GET /network-config/v1alpha1/airgroup-system.
     *
     * @param  array<string, mixed>  $options
     */
    public function readAirgroupSystem(array $options = []): ?ArubaAirgroupSystemAirgroupSystemSchemaGet
    {
        return $this->fetch(new ReadAirgroupSystemRequest($options));
    }

    /**
     * Modify system configuration: PATCH /network-config/v1alpha1/airgroup-system.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateAirgroupSystem(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new UpdateAirgroupSystemRequest($this->payloadOf($attributes), $options));
    }
}
