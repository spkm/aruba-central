<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaConfigAssignmentConfigAssignmentsSchemaGETItem;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\CreateConfigAssignmentsRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\DeleteConfigAssignmentsConfigAssignmentByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\ReadConfigAssignmentsRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\ReplaceConfigAssignmentsConfigAssignmentByIDRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Config Assignment API, from Aruba::configuration()->assignments().
 *
 * @extends Builder<ArubaConfigAssignmentConfigAssignmentsSchemaGETItem>
 */
class AssignmentsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ArubaConfigAssignmentConfigAssignmentsSchemaGETItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ReadConfigAssignmentsRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateConfigAssignmentsRequest($body, $options);
    }

    /**
     * Delete config-assignment by scope-id, device-function, profile-type, profile-instance: DELETE /network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteConfigAssignmentsConfigAssignmentByID(string $scopeId, string $deviceFunction, string $profileType, string $profileInstance, array $options = []): mixed
    {
        return $this->fetch(new DeleteConfigAssignmentsConfigAssignmentByIDRequest($scopeId, $deviceFunction, $profileType, $profileInstance, $options));
    }

    /**
     * Replace config-assignment by scope-id, device-function, profile-type, profile-instance: PUT /network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceConfigAssignmentsConfigAssignmentByID(string $scopeId, string $deviceFunction, string $profileType, string $profileInstance, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new ReplaceConfigAssignmentsConfigAssignmentByIDRequest($scopeId, $deviceFunction, $profileType, $profileInstance, $this->payloadOf($attributes), $options));
    }
}
