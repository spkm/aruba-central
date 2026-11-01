<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get per AP setting.: GET /configuration/v1/ap_settings_cli/{serial_number}.
 */
class GetApSettingsClisRequest extends ListRequest
{
    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/ap_settings_cli/'.rawurlencode((string) $this->serialNumber);
    }
}
