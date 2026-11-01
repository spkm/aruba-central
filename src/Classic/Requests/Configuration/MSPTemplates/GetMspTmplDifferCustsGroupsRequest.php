<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use spkm\ArubaCentral\Classic\Data\Configuration\TemplateCustGroupDiffers;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get customers and groups where given MSP level template is not applied.: GET /configuration/v1/msp/templates/differences/{device_type}/{version}/{model}.
 */
class GetMspTmplDifferCustsGroupsRequest extends ListRequest
{
    protected ?string $dto = TemplateCustGroupDiffers::class;

    public string $resultKey = 'data';

    public ?int $maxLimit = 50;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $deviceType, protected string $version, protected string $model, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/msp/templates/differences/'.rawurlencode((string) $this->deviceType).'/'.rawurlencode((string) $this->version).'/'.rawurlencode((string) $this->model);
    }
}
