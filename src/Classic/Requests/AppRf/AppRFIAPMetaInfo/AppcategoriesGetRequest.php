<?php

namespace spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo;

use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNAppCat;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gets Top N App categories: GET /apprf/v1/appcategories.
 *
 * Query options: count, group, swarm_id, serial, macaddr, from_timestamp, to_timestamp, ssids, user_role, details.
 */
class AppcategoriesGetRequest extends ItemRequest
{
    protected ?string $dto = ApprfTopNAppCat::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/apprf/v1/appcategories';
    }
}
