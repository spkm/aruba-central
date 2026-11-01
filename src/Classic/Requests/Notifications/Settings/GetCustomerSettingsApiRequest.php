<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use spkm\ArubaCentral\Classic\Data\Notifications\CustomerSettings;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Customer account level Settings: GET /central/v1/notifications/customer_settings.
 */
class GetCustomerSettingsApiRequest extends ItemRequest
{
    protected ?string $dto = CustomerSettings::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications/customer_settings';
    }
}
