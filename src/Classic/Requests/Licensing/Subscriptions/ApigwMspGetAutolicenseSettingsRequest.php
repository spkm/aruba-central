<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get auto enabled services for msp or tenant customer.: GET /platform/licensing/v1/msp/customer/settings/autolicense.
 *
 * Query parameters (* required): customer_id*.
 */
class ApigwMspGetAutolicenseSettingsRequest extends ListRequest
{
    public string $resultKey = 'services';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/licensing/v1/msp/customer/settings/autolicense';
    }
}
