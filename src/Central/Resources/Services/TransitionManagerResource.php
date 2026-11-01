<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\CurrentCustomerAction;
use spkm\ArubaCentral\Central\Data\Services\MigrationIdMappingResult;
use spkm\ArubaCentral\Central\Data\Services\MspIdInformationResult;
use spkm\ArubaCentral\Central\Data\Services\MspIdMappingResult;
use spkm\ArubaCentral\Central\Data\Services\OperationResult;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\FlushTransitionCacheRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetCurrentCustomerActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetCustomerByMigrationIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetMigrationMspTenantInformationRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetMspTenantMappingRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListCustomersByActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListCustomersRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListDebugInformationRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListExcludedCustomersRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListMigrationActionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListMigrationApplicationStatusesRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListMigrationDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetBigHammerRollbackRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetCustomerActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetMigrationIdCheckRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetMspCustomerActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\UpdateExcludedCustomersRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Transition Manager API, from Aruba::transitionManager().
 *
 * @extends BaseResource<Data>
 */
class TransitionManagerResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Flush cache: POST /network-services/v1/tms-cache-flushes.
     *
     * @param  array<string, mixed>  $options
     */
    public function flushTransitionCache(array $options = []): ?OperationResult
    {
        return $this->fetch(new FlushTransitionCacheRequest($options));
    }

    /**
     * Get the current customer transition action: GET /network-services/v1/tms-current-customer-action.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCurrentCustomerAction(array $options = []): ?CurrentCustomerAction
    {
        return $this->fetch(new GetCurrentCustomerActionRequest($options));
    }

    /**
     * Get a customer ID by migration ID: GET /network-services/v1/tms-migration-id-mappings/{migration-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCustomerByMigrationId(string $migrationId, array $options = []): ?MigrationIdMappingResult
    {
        return $this->fetch(new GetCustomerByMigrationIdRequest($migrationId, $options));
    }

    /**
     * Get MSP ID information by migration MSP ID: GET /network-services/v1/tms-migration-msp-id-record.
     *
     * @param  array<string, mixed>  $options
     */
    public function getMigrationMspTenantInformation(string $migrationMspId, array $options = []): ?MspIdInformationResult
    {
        return $this->fetch(new GetMigrationMspTenantInformationRequest($migrationMspId, $options));
    }

    /**
     * Get an MSP tenant mapping: POST /network-services/v1/tms-msp-id-mappings.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function getMspTenantMapping(array|Data $attributes = [], array $options = []): ?MspIdMappingResult
    {
        return $this->fetch(new GetMspTenantMappingRequest($this->payloadOf($attributes), $options));
    }

    /**
     * List customers by transition action: GET /network-services/v1/tms-transition-action-assignments.
     *
     * @return ListResource<Data>
     */
    public function listCustomersByAction(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListCustomersByActionRequest($query));
    }

    /**
     * Get customer IDs: GET /network-services/v1/tms-customer-ids.
     *
     * @return ListResource<Data>
     */
    public function listCustomers(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListCustomersRequest($query));
    }

    /**
     * List diagnostic records: GET /network-services/v1/tms-debug-records.
     *
     * @return ListResource<Data>
     */
    public function listDebugInformation(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListDebugInformationRequest($query));
    }

    /**
     * List excluded customers: GET /network-services/v1/tms-excluded-ids.
     *
     * @return ListResource<Data>
     */
    public function listExcludedCustomers(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListExcludedCustomersRequest($query));
    }

    /**
     * Get customer setting modes by migration ID: GET /network-services/v1/tms-migration-actions.
     *
     * @return ListResource<Data>
     */
    public function listMigrationActions(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListMigrationActionsRequest($query));
    }

    /**
     * Get customer's app status by migration cid: GET /network-services/v1/tms-migration-application-statuses.
     *
     * @return ListResource<Data>
     */
    public function listMigrationApplicationStatuses(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListMigrationApplicationStatusesRequest($query));
    }

    /**
     * Get customer details by migration ID: GET /network-services/v1/tms-migration-details.
     *
     * @return ListResource<Data>
     */
    public function listMigrationDetails(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListMigrationDetailsRequest($query));
    }

    /**
     * Create a transition rollback: POST /network-services/v1/tms-transition-rollbacks.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setBigHammerRollback(array|Data $attributes = [], array $options = []): ?OperationResult
    {
        return $this->fetch(new SetBigHammerRollbackRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Create customer transition actions: POST /network-services/v1/tms-transition-actions.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setCustomerAction(array|Data $attributes = [], array $options = []): ?OperationResult
    {
        return $this->fetch(new SetCustomerActionRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Enable or disable migration ID existence check: POST /network-services/v1/tms-migration-id-check-updates.
     *
     * @param  array<string, mixed>  $options
     */
    public function setMigrationIdCheck(string $check, array $options = []): ?OperationResult
    {
        return $this->fetch(new SetMigrationIdCheckRequest($check, $options));
    }

    /**
     * Set MSP customer transition actions: POST /network-services/v1/tms-msp-transition-actions.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setMspCustomerAction(array|Data $attributes = [], array $options = []): ?OperationResult
    {
        return $this->fetch(new SetMspCustomerActionRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update excluded customer identifiers: POST /network-services/v1/tms-excluded-ids.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateExcludedCustomers(array|Data $attributes = [], array $options = []): ?OperationResult
    {
        return $this->fetch(new UpdateExcludedCustomersRequest($this->payloadOf($attributes), $options));
    }
}
