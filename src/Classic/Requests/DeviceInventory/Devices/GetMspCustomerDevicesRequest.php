<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use spkm\ArubaCentral\Classic\Data\DeviceInventory\LicenseAndDevicesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * A filterable paginated response of a list of devices and licenses under the customer account based on the provided limit and offset parameters: GET /platform/device_inventory/v1/msp/{customer_id}/devices.
 *
 * Query parameters: device_type.
 */
class GetMspCustomerDevicesRequest extends ListRequest
{
    protected ?string $dto = LicenseAndDevicesItem::class;

    public string $resultKey = 'devices';

    public ?string $totalKey = null;

    public ?int $maxLimit = 50;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $customerId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/msp/'.rawurlencode((string) $this->customerId).'/devices';
    }
}
