<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Central\Data\Monitoring\ImportStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Retrieve Import Status: GET /network-monitoring/v1/sitemaps/{site-id}/import/{id}.
 */
class GetImportStatusRequest extends ItemRequest
{
    protected ?string $dto = ImportStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/import/'.rawurlencode((string) $this->id);
    }
}
