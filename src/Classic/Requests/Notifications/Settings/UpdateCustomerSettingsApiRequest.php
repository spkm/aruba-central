<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update customer settings: PUT /central/v1/notifications/customer_settings.
 *
 * Body: add_sites_to_mute, remove_sites_from_mute, update_site_emails, default_recipients_email_list, email_subject_line_template.
 */
class UpdateCustomerSettingsApiRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
        return '/central/v1/notifications/customer_settings';
    }
}
