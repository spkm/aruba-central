<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get AP configuration.: GET /configuration/v1/ap_cli/{group_name_or_guid_or_serial_number}.
 *
 * Query parameters: version.
 */
class GetConfigurationClisRequest extends ListRequest
{
    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/ap_cli/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
