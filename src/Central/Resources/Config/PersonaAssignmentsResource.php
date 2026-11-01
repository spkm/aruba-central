<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\PersonaAssignment\CreatePersonaAssignmentPersonaDeviceListByIDRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Persona Assignment API, from Aruba::configuration()->personaAssignments().
 *
 * @extends BaseResource<Data>
 */
class PersonaAssignmentsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Assign device function to a list of devices.: POST /network-config/v1alpha1/persona-assignment/{device-function}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createPersonaAssignmentPersonaDeviceListByID(string $deviceFunction, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreatePersonaAssignmentPersonaDeviceListByIDRequest($deviceFunction, $this->payloadOf($attributes), $options));
    }
}
