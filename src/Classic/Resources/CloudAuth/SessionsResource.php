<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\AccessRecord;
use spkm\ArubaCentral\Classic\Data\CloudAuth\AuthRecord;
use spkm\ArubaCentral\Classic\Data\CloudAuth\SessionRecord;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadAuthAirPassListRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadAuthCloudIdentityListRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadAuthDetailsRecordRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadCloudIdentitySessionListRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadSessionAirPassListRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Authentications and Sessions API, from Aruba::cloudAuth()->sessions().
 *
 * @extends Builder<AuthRecord>
 */
class SessionsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AuthRecord::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ReadAuthAirPassListRequest($query);
    }

    /**
     * Fetch list of authentications using Cloud Identity.: GET /cloudAuth/api/v1/auth/cloud_identity/list.
     *
     * @return ListResource<AuthRecord>
     */
    public function readAuthCloudIdentityList(): ListResource
    {
        return new ListResource($this->connector, AuthRecord::class, fn (Query $query) => new ReadAuthCloudIdentityListRequest($query));
    }

    /**
     * Fetch details of a specific authentication using either Cloud Identity or Aruba Air Pass.: GET /cloudAuth/api/v1/auth/{request_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function readAuthDetailsRecord(string $requestId, array $options = []): ?AccessRecord
    {
        return $this->fetch(new ReadAuthDetailsRecordRequest($requestId, $options));
    }

    /**
     * Fetch list of sessions using Cloud Identity.: GET /cloudAuth/api/v1/session/cloud_identity/list.
     *
     * @return ListResource<SessionRecord>
     */
    public function readCloudIdentitySessionList(): ListResource
    {
        return new ListResource($this->connector, SessionRecord::class, fn (Query $query) => new ReadCloudIdentitySessionListRequest($query));
    }

    /**
     * Fetch list of sessions using Aruba Air Pass.: GET /cloudAuth/api/v1/session/air_pass/list.
     *
     * @return ListResource<SessionRecord>
     */
    public function readSessionAirPassList(): ListResource
    {
        return new ListResource($this->connector, SessionRecord::class, fn (Query $query) => new ReadSessionAirPassListRequest($query));
    }
}
