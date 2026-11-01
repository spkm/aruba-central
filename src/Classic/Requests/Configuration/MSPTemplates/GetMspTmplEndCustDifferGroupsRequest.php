<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use spkm\ArubaCentral\Classic\Data\Configuration\TemplateCustGroupDiffers;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get groups for given end customer where MSP Level template is not applied.: GET /configuration/v1/msp/templates/differences/customer/{cid}/{device_type}/{version}/{model}.
 */
class GetMspTmplEndCustDifferGroupsRequest extends ListRequest
{
    protected ?string $dto = TemplateCustGroupDiffers::class;

    public string $resultKey = 'data';

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $cid, protected string $deviceType, protected string $version, protected string $model, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/msp/templates/differences/customer/'.rawurlencode((string) $this->cid).'/'.rawurlencode((string) $this->deviceType).'/'.rawurlencode((string) $this->version).'/'.rawurlencode((string) $this->model);
    }
}
