<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A AppVersionDetailsDTO record.
 */
readonly class AppVersionDetailsDTO extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $allowed_external_urls
     * @param  array<mixed>|null  $app_allowed_device_class_classification
     * @param  array<mixed>|null  $app_device_class_permissions
     * @param  array<mixed>|null  $app_features
     * @param  array<mixed>|null  $categories
     * @param  array<mixed>|null  $container_required_environment_variables
     * @param  array<mixed>|null  $container_subscription_list
     * @param  array<mixed>|null  $icon
     * @param  array<mixed>|null  $lua_script
     * @param  array<mixed>|null  $lua_subscription_list
     * @param  array<mixed>|null  $supported_platforms
     * @param  array<mixed>|null  $usb_config
     * @param  array<mixed>|null  $zigbee_config
     */
    public function __construct(
        public ?array $allowed_external_urls = null,
        public ?array $app_allowed_device_class_classification = null,
        /** One of: BLOCK, READ_ONLY, READ_WRITE. */
        public ?string $app_ap_permission = null,
        /** One of: BLOCK, READ_ONLY, READ_WRITE. */
        public ?string $app_beacon_permission = null,
        /** A list of AppDeviceClassPermissionsDTO records. */
        public ?array $app_device_class_permissions = null,
        public ?array $app_features = null,
        public ?string $app_id = null,
        /** One of: BLOCK, READ_ONLY, READ_WRITE. */
        public ?string $app_radio_permission = null,
        public ?string $app_support = null,
        public ?string $author_website = null,
        /** A list of AppCategoryDTO records. */
        public ?array $categories = null,
        public ?string $container_ap_image_uuid = null,
        public ?string $container_cpu_ap = null,
        public ?string $container_cpu_medium_dc = null,
        public ?string $container_cpu_mini_dc = null,
        public ?string $container_cpu_small_dc = null,
        public ?string $container_image_uuid = null,
        public ?string $container_mem_ap = null,
        public ?string $container_mem_medium_dc = null,
        public ?string $container_mem_mini_dc = null,
        public ?string $container_mem_small_dc = null,
        /** A list of ContainerEnvironmentVariableDTO records. */
        public ?array $container_required_environment_variables = null,
        /** A list of ContainerSubscriptionDTO records. */
        public ?array $container_subscription_list = null,
        public ?string $created_by = null,
        public ?string $description = null,
        public ?bool $feature_ble = null,
        public ?bool $feature_edge_compute = null,
        public ?bool $feature_usb = null,
        public ?bool $feature_zigbee = null,
        /** Keys: data, name, url. */
        public ?array $icon = null,
        public ?bool $is_last_version = null,
        public ?bool $is_live = null,
        public ?string $license_agreement_url = null,
        /** Keys: data, file_id, name. */
        public ?array $lua_script = null,
        /** A list of LuaSubscriptionDTO records. */
        public ?array $lua_subscription_list = null,
        public ?string $minimum_sdk_version = null,
        public ?string $modified_by = null,
        public ?string $name = null,
        public ?string $platform_url = null,
        public ?string $privacy_policy_url = null,
        public ?string $release_notes = null,
        public ?bool $required_user_ca_certificates = null,
        public ?bool $required_user_outbound_firewall_permission = null,
        public ?bool $required_user_permission = null,
        public ?bool $required_user_subscription = null,
        public ?string $status = null,
        public ?string $summary = null,
        public ?array $supported_platforms = null,
        /** A list of UsbConfigDTO records. */
        public ?array $usb_config = null,
        public ?int $version = null,
        /** A list of ZigbeeConfigDTO records. */
        public ?array $zigbee_config = null,
    ) {}
}
