<?php

namespace spkm\ArubaCentral\Classic\Resources\Rapids;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Rapids\ClientAttack;
use spkm\ArubaCentral\Classic\Data\Rapids\InfrastructureAttack;
use spkm\ArubaCentral\Classic\Data\Rapids\InterferingAp;
use spkm\ArubaCentral\Classic\Data\Rapids\ManuallyContainedAp;
use spkm\ArubaCentral\Classic\Data\Rapids\NeighborAp;
use spkm\ArubaCentral\Classic\Data\Rapids\RogueAp;
use spkm\ArubaCentral\Classic\Data\Rapids\SuspectAp;
use spkm\ArubaCentral\Classic\Data\Rapids\WidsEvent;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetClientAttacksRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetInfrastructureAttacksRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1InterferingApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1ManuallyContainedApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1NeighborApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1RogueApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1SuspectApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetWidsEventsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Rogues API, from Aruba::rapids().
 *
 * @extends BaseResource<Data>
 */
class RapidsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * List Client Attacks: GET /rapids/v1/wids/client_attacks.
     *
     * @return ListResource<ClientAttack>
     */
    public function getClientAttacks(): ListResource
    {
        return new ListResource($this->connector, ClientAttack::class, fn (Query $query) => new GetClientAttacksRequest($query));
    }

    /**
     * List Infrastructure Attacks: GET /rapids/v1/wids/infrastructure_attacks.
     *
     * @return ListResource<InfrastructureAttack>
     */
    public function getInfrastructureAttacks(): ListResource
    {
        return new ListResource($this->connector, InfrastructureAttack::class, fn (Query $query) => new GetInfrastructureAttacksRequest($query));
    }

    /**
     * WIDS Events: GET /rapids/v1/wids/events.
     *
     * @return ListResource<WidsEvent>
     */
    public function getWidsEvents(): ListResource
    {
        return new ListResource($this->connector, WidsEvent::class, fn (Query $query) => new GetWidsEventsRequest($query));
    }

    /**
     * List Interfering APs: GET /rapids/v1/interfering_aps.
     *
     * @return ListResource<InterferingAp>
     */
    public function getRapidsV1InterferingAps(): ListResource
    {
        return new ListResource($this->connector, InterferingAp::class, fn (Query $query) => new GetRapidsV1InterferingApsRequest($query));
    }

    /**
     * List manually contained APs: GET /rapids/v1/manually_contained_aps.
     *
     * @return ListResource<ManuallyContainedAp>
     */
    public function getRapidsV1ManuallyContainedAps(): ListResource
    {
        return new ListResource($this->connector, ManuallyContainedAp::class, fn (Query $query) => new GetRapidsV1ManuallyContainedApsRequest($query));
    }

    /**
     * List neighbor APs: GET /rapids/v1/neighbor_aps.
     *
     * @return ListResource<NeighborAp>
     */
    public function getRapidsV1NeighborAps(): ListResource
    {
        return new ListResource($this->connector, NeighborAp::class, fn (Query $query) => new GetRapidsV1NeighborApsRequest($query));
    }

    /**
     * List Rogue APs: GET /rapids/v1/rogue_aps.
     *
     * @return ListResource<RogueAp>
     */
    public function getRapidsV1RogueAps(): ListResource
    {
        return new ListResource($this->connector, RogueAp::class, fn (Query $query) => new GetRapidsV1RogueApsRequest($query));
    }

    /**
     * List suspect APs: GET /rapids/v1/suspect_aps.
     *
     * @return ListResource<SuspectAp>
     */
    public function getRapidsV1SuspectAps(): ListResource
    {
        return new ListResource($this->connector, SuspectAp::class, fn (Query $query) => new GetRapidsV1SuspectApsRequest($query));
    }
}
