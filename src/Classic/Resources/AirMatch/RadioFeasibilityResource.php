<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AirMatch\RadioFeas;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GetAllRadioFeasRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GetFeasRadioInfoRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GETGetAllRadioFeasRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GETGetRadioFeasByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GetRadioFeasByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\UpdateFeasibilityRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Radio feasibility API, from Aruba::airMatch()->radioFeasibility().
 *
 * @extends Builder<RadioFeas>
 */
class RadioFeasibilityResource extends Builder
{
    protected string $idField = 'radioMac';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, RadioFeas::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAllRadioFeasRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetRadioFeasByRadioMacRequest((string) $id);
    }

    /**
     * Get feasibility radio info of a specific radio MAC: GET /feasibility/v1/radio_info/{radioMac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getFeasRadioInfo(string $radioMac, array $options = []): mixed
    {
        return $this->fetch(new GetFeasRadioInfoRequest($radioMac, $options));
    }

    /**
     * Get all radio feasibility for a customer: GET /receiver/v1/radio_feasibility_all.
     *
     * @return ListResource<RadioFeas>
     */
    public function getAllRadioFeas(): ListResource
    {
        return new ListResource($this->connector, RadioFeas::class, fn (Query $query) => new GETGetAllRadioFeasRequest($query));
    }

    /**
     * Get radio feasibility of a specific radio MAC: GET /receiver/v1/radio_feasibility/{radioMac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioFeasByRadioMac(string $radioMac, array $options = []): ?RadioFeas
    {
        return $this->fetch(new GETGetRadioFeasByRadioMacRequest($radioMac, $options));
    }

    /**
     * Trigger update of radio feasibility: PUT /receiver/v1/radio_feasibility_update/{radio_mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function updateFeasibility(string $radioMac, array $options = []): mixed
    {
        return $this->fetch(new UpdateFeasibilityRequest($radioMac, $options));
    }
}
