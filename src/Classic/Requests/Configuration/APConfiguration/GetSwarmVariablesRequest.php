<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\ApVariables;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get variables config.: GET /configuration/v1/iap_variables/{group_name_or_guid_or_serial_number}.
 */
class GetSwarmVariablesRequest extends ListRequest
{
    protected ?string $dto = ApVariables::class;

    public string $resultKey = 'variables';

    public ?string $totalKey = null;

    public ?int $maxLimit = 10000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/iap_variables/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
