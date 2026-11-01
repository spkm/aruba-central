<?php

namespace spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo;

use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNWebId;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gets Top N Web categories: GET /apprf/v1/webcategories.
 *
 * Query options: count, group, swarm_id, serial, macaddr, from_timestamp, to_timestamp, ssids, user_role, details.
 */
class WebcategoriesGetRequest extends ItemRequest
{
    protected ?string $dto = ApprfTopNWebId::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/apprf/v1/webcategories';
    }
}
