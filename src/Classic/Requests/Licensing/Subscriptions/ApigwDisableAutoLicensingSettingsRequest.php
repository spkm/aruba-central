<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Standalone Customer API:- Disable auto licensing for given services.: DELETE /platform/licensing/v1/customer/settings/autolicense.
 *
 * Body: services.
 */
class ApigwDisableAutoLicensingSettingsRequest extends WriteRequest
{
    protected Method $method = Method::DELETE;

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
        return '/platform/licensing/v1/customer/settings/autolicense';
    }
}
