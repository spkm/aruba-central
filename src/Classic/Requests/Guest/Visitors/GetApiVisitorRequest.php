<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Visitors;

use spkm\ArubaCentral\Classic\Data\Guest\Visitor;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get guest visitor account: GET /guest/v1/portals/{portal_id}/visitors/{visitor_id}.
 */
class GetApiVisitorRequest extends ItemRequest
{
    protected ?string $dto = Visitor::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $portalId, protected string $visitorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId).'/visitors/'.rawurlencode((string) $this->visitorId);
    }
}
