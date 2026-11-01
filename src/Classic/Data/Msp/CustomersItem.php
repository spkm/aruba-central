<?php

namespace spkm\ArubaCentral\Classic\Data\Msp;

use spkm\ArubaCentral\Data\Data;

/**
 * A CustomersItem record.
 */
readonly class CustomersItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $group
     * @param  array<mixed>|null  $platform_customer_details
     */
    public function __construct(
        /** Account status */
        public ?string $account_status = null,
        public ?string $account_type = null,
        /** Application ID */
        public ?string $application_id = null,
        /** Application Instance ID */
        public ?string $application_instance_id = null,
        /** Creation time in epoch time */
        public ?float $created_at = null,
        /** Customer ID */
        public ?string $customer_id = null,
        /** Customer Name */
        public ?string $customer_name = null,
        /** Customer Description */
        public ?string $description = null,
        /** Group information */
        public ?array $group = null,
        /** Number of Devices which can be added manually for a customer using MAC address & Serial Number */
        public ?int $device_quota = null,
        public ?bool $lock_msp_ssids = null,
        public ?string $msp_conversion_status = null,
        /** Customer ID of the MSP this customer belongs under */
        public ?int $msp_id = null,
        public ?array $platform_customer_details = null,
        /** Platform Customer ID */
        public ?string $platform_customer_id = null,
        /** Whether the Customer is provisioned PROVISIONED PROVISION_INIT One of: PROVISIONED, PROVISION_INIT. */
        public ?string $provision_status = null,
        /** Region */
        public ?string $region = null,
        /** IAP config diff against MSP assgined group to end customer against default group at end customer */
        public ?string $ap_config_diff = null,
        /** Aruba Swtich config diff against MSP assgined group to end customer against default group at end customer */
        public ?string $hppc_config_diff = null,
        /** MAS switch config diff against MSP assgined group to end customer against default group at end customer */
        public ?string $switch_config_diff = null,
        /** Updated date */
        public ?string $updated_at = null,
        public ?string $username = null,
    ) {}
}
