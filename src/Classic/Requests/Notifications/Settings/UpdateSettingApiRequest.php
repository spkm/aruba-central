<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Notifications\SettingsResponse;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update settings details: PUT /central/v1/notifications/settings/{settings_id}.
 *
 * Body: type, rules, active.
 */
class UpdateSettingApiRequest extends WriteRequest
{
    protected ?string $dto = SettingsResponse::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $settingsId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications/settings/'.rawurlencode((string) $this->settingsId);
    }
}
