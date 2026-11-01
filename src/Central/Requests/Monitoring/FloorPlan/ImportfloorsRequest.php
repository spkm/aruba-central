<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\ImportStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Import FloorPlans using zip file: POST /network-monitoring/v1/sitemaps/{site-id}/import.
 *
 * Body: file, importLevel, siteName.
 */
class ImportfloorsRequest extends WriteRequest
{
    protected ?string $dto = ImportStatus::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/import';
    }
}
