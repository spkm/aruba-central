<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions;

use spkm\ArubaCentral\Classic\Data\CloudAuth\AccessRecord;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Fetch details of a specific authentication using either Cloud Identity or Aruba Air Pass.: GET /cloudAuth/api/v1/auth/{request_id}.
 */
class ReadAuthDetailsRecordRequest extends ItemRequest
{
    protected ?string $dto = AccessRecord::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $requestId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v1/auth/'.rawurlencode((string) $this->requestId);
    }
}
