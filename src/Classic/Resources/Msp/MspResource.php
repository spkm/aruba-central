<?php

namespace spkm\ArubaCentral\Classic\Resources\Msp;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Msp\CountryCode;
use spkm\ArubaCentral\Classic\Data\Msp\CustomersItem;
use spkm\ArubaCentral\Classic\Data\Msp\LicenseAndDevices;
use spkm\ArubaCentral\Classic\Data\Msp\Resource;
use spkm\ArubaCentral\Classic\Data\Msp\TenantsMappedItem;
use spkm\ArubaCentral\Classic\Data\Msp\User;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\CreateCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\DeleteCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\EditCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\EditResourceRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCountryCodeRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomerDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomersRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomerUsersRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetMappedTenantsRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetMspUsersRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetResourceRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\MoveDevicesToCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\UnassignTenantDevicesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Customers API, from Aruba::msp().
 *
 * @extends Builder<CustomersItem>
 */
class MspResource extends Builder
{
    protected string $idField = 'customerId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, CustomersItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCustomersRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetCustomerRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateCustomerRequest($body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new EditCustomerRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteCustomerRequest((string) $id, $options);
    }

    /**
     * Edit an existing resource for the MSP: PUT /msp_api/v1/resource.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function editResource(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new EditResourceRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get list of country code: GET /msp_api/v2/get_country_code.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCountryCode(array $options = []): ?CountryCode
    {
        return $this->fetch(new GetCountryCodeRequest($options));
    }

    /**
     * Get list of devices and licenses under the Customer account based on limit and offset, offset should be a multiple of the limit value: GET /msp_api/v1/customers/{customer_id}/devices.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCustomerDevices(string $customerId, array $options = []): ?LicenseAndDevices
    {
        return $this->fetch(new GetCustomerDevicesRequest($customerId, $options));
    }

    /**
     * Get list of users under the Customer account based on limit and offset: GET /msp_api/v1/customers/{customer_id}/users.
     *
     * @return ListResource<User>
     */
    public function getCustomerUsers(string $customerId): ListResource
    {
        return new ListResource($this->connector, User::class, fn (Query $query) => new GetCustomerUsersRequest($customerId, $query));
    }

    /**
     * Get list of devices and licenses under the MSP account based on limit and offset, offset should be a multiple of the limit value: GET /msp_api/v1/devices.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDevices(array $options = []): ?LicenseAndDevices
    {
        return $this->fetch(new GetDevicesRequest($options));
    }

    /**
     * Get list of customers mapped to MSP group based on limit and offset.: GET /msp_api/v1/groups/{group_name}/customers.
     *
     * @return ListResource<TenantsMappedItem>
     */
    public function getMappedTenants(string $groupName): ListResource
    {
        return new ListResource($this->connector, TenantsMappedItem::class, fn (Query $query) => new GetMappedTenantsRequest($groupName, $query));
    }

    /**
     * Get list of users under the MSP account based on limit and offset: GET /msp_api/v1/customers/users.
     *
     * @return ListResource<User>
     */
    public function getMspUsers(): ListResource
    {
        return new ListResource($this->connector, User::class, fn (Query $query) => new GetMspUsersRequest($query));
    }

    /**
     * Get the resource under the MSP: GET /msp_api/v1/resource.
     *
     * @param  array<string, mixed>  $options
     */
    public function getResource(array $options = []): ?Resource
    {
        return $this->fetch(new GetResourceRequest($options));
    }

    /**
     * Move a device to an end-customer: PUT /msp_api/v1/customers/{customer_id}/devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function moveDevicesToCustomer(string $customerId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new MoveDevicesToCustomerRequest($customerId, $this->payloadOf($attributes), $options));
    }

    /**
     * Un-assign all devices from Tenant/end-customer.: PUT /msp_api/v2/{customer_id}/devices.
     *
     * @param  array<string, mixed>  $options
     */
    public function unassignTenantDevices(string $customerId, array $options = []): mixed
    {
        return $this->fetch(new UnassignTenantDevicesRequest($customerId, $options));
    }
}
