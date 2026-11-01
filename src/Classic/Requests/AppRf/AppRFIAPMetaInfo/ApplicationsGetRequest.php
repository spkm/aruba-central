<?php

namespace spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo;

use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNApp;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gets Top N Applications: GET /apprf/v1/applications.
 *
 * Query options: count, group, swarm_id, serial, macaddr, from_timestamp, to_timestamp, ssids, user_role, details.
 */
class ApplicationsGetRequest extends ItemRequest
{
    protected ?string $dto = ApprfTopNApp::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/apprf/v1/applications';
    }
}
