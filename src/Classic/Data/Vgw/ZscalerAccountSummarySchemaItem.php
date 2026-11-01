<?php

namespace spkm\ArubaCentral\Classic\Data\Vgw;

use spkm\ArubaCentral\Data\Data;

/**
 * A ZscalerAccountSummarySchemaItem record.
 */
readonly class ZscalerAccountSummarySchemaItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $credentials
     */
    public function __construct(
        public ?string $access_check_at = null,
        public ?string $account_id = null,
        public ?string $account_name = null,
        public ?string $created_at = null,
        public ?string $customer_id = null,
        public ?string $customer_name = null,
        public ?string $last_deployment_at = null,
        public ?bool $managed = null,
        public ?string $provider_name = null,
        public ?string $status = null,
        public ?string $subscription_check_at = null,
        public ?float $subscription_status = null,
        public ?array $credentials = null,
    ) {}
}
