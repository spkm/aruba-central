<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\AppsDTO;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create App: POST /v1/adp/apps/draft.
 *
 * Body: allowed_external_urls, app_allowed_device_class_classification, app_ap_permission, app_beacon_permission, app_device_class_permissions, app_features, app_radio_permission, app_support, author_website, categories, container_ap_image_uuid, container_cpu_ap.
 */
class CreateDraftAppRequest extends WriteRequest
{
    protected ?string $dto = AppsDTO::class;

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
        return '/v1/adp/apps/draft';
    }
}
