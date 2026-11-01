<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * create floorplans using zip file (supported files are zip and .esx): POST /visualrf_api/v1/restore_sites.
 *
 * Body: file.
 */
class PostVisualrfApiV1RestoreSitesRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/restore_sites';
    }
}
