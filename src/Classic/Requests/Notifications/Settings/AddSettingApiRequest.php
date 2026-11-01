<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Notifications\SettingsResponse;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add settings: POST /central/v1/notifications/settings.
 *
 * Body: type, rules, active.
 */
class AddSettingApiRequest extends WriteRequest
{
    protected ?string $dto = SettingsResponse::class;

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
        return '/central/v1/notifications/settings';
    }
}
