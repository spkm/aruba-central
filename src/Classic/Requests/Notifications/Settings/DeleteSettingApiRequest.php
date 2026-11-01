<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Settings: DELETE /central/v1/notifications/settings/{settings_id}.
 */
class DeleteSettingApiRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $settingsId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications/settings/'.rawurlencode((string) $this->settingsId);
    }
}
