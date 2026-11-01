<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Visitors;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update guest visitor account: PUT /guest/v1/portals/{portal_id}/visitors/{visitor_id}.
 *
 * Body: name, id, company_name, user, is_enabled, valid_till_no_limit, valid_till_days, valid_till_hours, valid_till_minutes, notify, notify_to, password.
 */
class UpdateApiVisitorRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $portalId, protected string $visitorId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId).'/visitors/'.rawurlencode((string) $this->visitorId);
    }
}
