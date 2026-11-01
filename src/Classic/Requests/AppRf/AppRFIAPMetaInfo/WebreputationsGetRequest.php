<?php

namespace spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo;

use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNWebRep;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gets Top Web Reputations: GET /apprf/v1/webreputations.
 *
 * Query options: group, swarm_id, serial, macaddr, from_timestamp, to_timestamp, ssids, user_role, details.
 */
class WebreputationsGetRequest extends ItemRequest
{
    protected ?string $dto = ApprfTopNWebRep::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/apprf/v1/webreputations';
    }
}
