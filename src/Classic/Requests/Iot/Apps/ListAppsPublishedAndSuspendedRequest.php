<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use spkm\ArubaCentral\Classic\Data\Iot\PageApps;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * List Published and Suspended Apps: GET /v1/adp/apps.
 *
 * Query options: sort, pageNumber, pageSize, userId, isOwner.
 */
class ListAppsPublishedAndSuspendedRequest extends ItemRequest
{
    protected ?string $dto = PageApps::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adp/apps';
    }
}
