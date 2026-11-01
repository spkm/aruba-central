<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A Portal record.
 */
readonly class Portal extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $login_button_title
     * @param  array<mixed>|null  $whitelist_urls
     * @param  array<mixed>|null  $sms_messages
     * @param  array<mixed>|null  $auth_sources
     * @param  array<mixed>|null  $facebook_wifi_configure_url
     * @param  array<mixed>|null  $facebook_wifi_gateway_id
     * @param  array<mixed>|null  $redirect_url
     * @param  array<mixed>|null  $auth_failure_message
     * @param  array<mixed>|null  $session_timeout
     * @param  array<mixed>|null  $usage_time
     * @param  array<mixed>|null  $usage_data
     * @param  array<mixed>|null  $background_color
     * @param  array<mixed>|null  $button_color
     * @param  array<mixed>|null  $header_fill_color
     * @param  array<mixed>|null  $page_font_color
     * @param  array<mixed>|null  $logo
     * @param  array<mixed>|null  $background_image
     * @param  array<mixed>|null  $page_title
     * @param  array<mixed>|null  $welcome_text
     * @param  array<mixed>|null  $terms_condition
     * @param  array<mixed>|null  $ad_url
     * @param  array<mixed>|null  $ad_image
     * @param  array<mixed>|null  $capture_url
     */
    public function __construct(
        /** Name of the portal (max length 22 characters) */
        public ?string $name = null,
        /** Authentication type of portal One of: unauthenticated, authenticated, facebookwifi. */
        public ?string $auth_type = null,
        /** Username/Password authentication type */
        public ?bool $username_password_enabled = null,
        /** Identify if guest user can register on the portal */
        public ?bool $registration_enabled = null,
        /** Identify if verification is required for guest registration */
        public ?bool $verify_registration = null,
        /** Identify if CNA policy is to be bypassed */
        public ?bool $bypass_cna_policy = null,
        /** One of: allow_always, automatic. */
        public ?string $cna_policy = null,
        /** Identify if guest registration is performed via e-mail */
        public ?bool $register_accept_email = null,
        /** Identify if guest registration is performed via phone */
        public ?bool $register_accept_phone = null,
        /** Free wifi allowed durations (0 to 59 minutes) */
        public ?int $free_wifi_duration = null,
        /** Indicates if default registration account expiry is unlimited or not */
        public ?bool $self_reg_account_unlimited = null,
        /** Specify the default registration account expiry in days, min 0 to max 180. */
        public ?int $self_reg_account_expire_days = null,
        /** Specify default registration account expiry in hours, min 0 to max 23 */
        public ?int $self_reg_account_expire_hours = null,
        /** Specify default registration account expiry in minutes, min 0 to max 59 */
        public ?int $self_reg_account_expire_minutes = null,
        /** Customizable login button label (optional field, max 32 characters). */
        public ?array $login_button_title = null,
        /** List of urls to white list or allow access before portal login */
        public ?array $whitelist_urls = null,
        /** Custom sms messages (optional). If not set, default messages will be sent during registration, password and verificaton of account. Keys: custom_username_label, custom_password_label, custom_sender_message, custom_verification_message, custom_registration_message, custom_pwd_reset_message. */
        public ?array $sms_messages = null,
        /** List of social auth app values. This could be empty array. A list of SocialAuth records. */
        public ?array $auth_sources = null,
        /** Use URL to create or customize the facebook wifi page which has to have facebook_wifi_gateway_id as a query param. Admin has to configure the page inorder to… */
        public ?array $facebook_wifi_configure_url = null,
        /** Gateway should be used with facebook_wifi_configure_url to configure facebook wifi portal. This is auto generated. */
        public ?array $facebook_wifi_gateway_id = null,
        /** Redirect url on succesful login */
        public ?array $redirect_url = null,
        /** Display message on authentication failure (max 4096 characters) */
        public ?array $auth_failure_message = null,
        /** Wireless connection session expiry. Valid input is minimum of 2 minutes and maximum of 180 days Keys: days, hours, minutes. */
        public ?array $session_timeout = null,
        /** Flag to indicate whether mac chacing enabled */
        public ?bool $mac_caching_enabled = null,
        /** Flag to indicate whether portal is shared */
        public ?bool $is_shared = null,
        /** Simultaneous portal logins limit. Value of 0 indicates there is no limit */
        public ?int $simultaneous_login_limit = null,
        /** IO data allowed to be used in a day. Either by time or data usage One of: bytime, bydata, nolimit. */
        public ?string $daily_usage_limit = null,
        /** This is required when daily_uage_limit is by time Keys: by_hours, by_minutes. */
        public ?array $usage_time = null,
        /** This is required when daily_uage_limit is by data Keys: data_type, data. */
        public ?array $usage_data = null,
        /** Background color of the portal. (Format '#XXXXXX', 6 hex characters) */
        public ?array $background_color = null,
        /** Button color. (Format '#XXXXXX' , 6 hex characters) */
        public ?array $button_color = null,
        /** Header color of the portal. This field can could be null. (Format '#XXXXXX' , 6 hex characters) */
        public ?array $header_fill_color = null,
        /** Portal page font color. (Format '#XXXXXX ', 6 hex characters) */
        public ?array $page_font_color = null,
        /** Name of logo file */
        public ?string $logo_name = null,
        /** Logo image. This is in base64 data format */
        public ?array $logo = null,
        /** Name of image file used as background */
        public ?string $background_image_name = null,
        /** Background image. This is in base64 data format */
        public ?array $background_image = null,
        /** Layout */
        public ?int $max_columns = null,
        /** Page title of the portal */
        public ?array $page_title = null,
        /** Welcome text to be displayed in the portal */
        public ?array $welcome_text = null,
        /** Terms and condition text to be displayed in the portal */
        public ?array $terms_condition = null,
        /** Show/hide terms condition check box */
        public ?bool $display_terms_checkbox = null,
        /** Inline or overlay display option. Internal indicates inline One of: internal, external. */
        public ?string $display_term_options = null,
        /** Advertisement url. This requires add image input */
        public ?array $ad_url = null,
        /** Name of logo file */
        public ?string $login_image_name = null,
        /** Advertisement image. This is in base64 data format */
        public ?array $ad_image = null,
        /** Indicates whether any configuration is associated to the portal */
        public ?bool $is_config_associated = null,
        /** URL to be used in wlan configuration */
        public ?array $capture_url = null,
        /** Parameter to override the common name */
        public ?string $override_common_name = null,
        /** Flag indicating whether the common name should be overridden */
        public ?bool $override_common_name_enabled = null,
    ) {}
}
