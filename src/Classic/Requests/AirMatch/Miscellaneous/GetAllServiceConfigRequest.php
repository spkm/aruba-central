<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous;

use spkm\ArubaCentral\Classic\Data\AirMatch\ServiceCfg;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Returns all device (AP) running configuration for all customers: GET /receiver/v1/service_config_all.
 */
class GetAllServiceConfigRequest extends ListRequest
{
    protected ?string $dto = ServiceCfg::class;

    public string $resultKey = '';

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
        return '/receiver/v1/service_config_all';
    }
}
