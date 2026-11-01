<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Visitors;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Guest\VisitorId;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a new guest visitor of a portal: POST /guest/v1/portals/{portal_id}/visitors.
 *
 * Body: name, id, company_name, user, is_enabled, valid_till_no_limit, valid_till_days, valid_till_hours, valid_till_minutes, notify, notify_to, password.
 */
class CreateApiVisitorRequest extends WriteRequest
{
    protected ?string $dto = VisitorId::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $portalId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId).'/visitors';
    }
}
