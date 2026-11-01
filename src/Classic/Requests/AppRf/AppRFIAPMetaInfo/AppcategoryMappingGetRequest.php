<?php

namespace spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo;

use spkm\ArubaCentral\Classic\Data\AppRf\IdToName;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gets Application Category id to name mapping: GET /apprf/v1/metainfo/iap/appcategory/id_to_name.
 */
class AppcategoryMappingGetRequest extends ItemRequest
{
    protected ?string $dto = IdToName::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/apprf/v1/metainfo/iap/appcategory/id_to_name';
    }
}
