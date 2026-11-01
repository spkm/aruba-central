<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedApEirpDistribution;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedStatNbr;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedStatRadio;
use spkm\ArubaCentral\Classic\Data\AirMatch\NbrPathloss;
use spkm\ArubaCentral\Classic\Data\AirMatch\PriorityRfEvents;
use spkm\ArubaCentral\Classic\Data\AirMatch\RadioHistoryList;
use spkm\ArubaCentral\Classic\Data\AirMatch\ReportRadio;
use spkm\ArubaCentral\Classic\Data\AirMatch\RfEvents;
use spkm\ArubaCentral\Classic\Data\AirMatch\StaticRadio;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatEirpFeasibleRangeRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatEirpReasonRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatEirpRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatRadioRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvStatNbrRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllNbrPathlossRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllPriorityRfEventsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllRepRadioRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllRfEventsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllStaticRadiosRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetHistoryByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetNbrPathlossByNbrBandRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetPriorityRfEventsByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRadioAllNbrPathlossRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRadioBoardLimitRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRepRadioByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRfEventsByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\RadioNeighborsGetReqRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Radio API, from Aruba::airMatch()->radio().
 *
 * @extends BaseResource<Data>
 */
class RadioResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get radio neighbor list: GET /ap_nbr_graph/v1/Radio/NeighborList/{radiomac}.
     *
     * @return ListResource<Data>
     */
    public function radioNeighborsGetReq(string $radiomac): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new RadioNeighborsGetReqRequest($radiomac, $query));
    }

    /**
     * Get board limits of a specific radio MAC: GET /feasibility/v1/board_limit/{radioMac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioBoardLimit(string $radioMac, array $options = []): mixed
    {
        return $this->fetch(new GetRadioBoardLimitRequest($radioMac, $options));
    }

    /**
     * Get EIRP reasons: GET /receiver/v1/adv_eirp_range.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAdvancedStatEirpFeasibleRange(array $options = []): mixed
    {
        return $this->fetch(new GetAdvancedStatEirpFeasibleRangeRequest($options));
    }

    /**
     * Get neighbor stats information: GET /telemetry/v1/adv_stat_nbr.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAdvStatNbr(array $options = []): ?AdvancedStatNbr
    {
        return $this->fetch(new GetAdvStatNbrRequest($options));
    }

    /**
     * Get EIRP distribution: GET /telemetry/v1/adv_eirp_distrubution.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAdvancedStatEirp(array $options = []): ?AdvancedApEirpDistribution
    {
        return $this->fetch(new GetAdvancedStatEirpRequest($options));
    }

    /**
     * Get EIRP reasons: GET /telemetry/v1/adv_eirp_reason.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAdvancedStatEirpReason(array $options = []): ?AdvancedApEirpDistribution
    {
        return $this->fetch(new GetAdvancedStatEirpReasonRequest($options));
    }

    /**
     * Get information about radio: GET /telemetry/v1/adv_stat_radio.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAdvancedStatRadio(array $options = []): ?AdvancedStatRadio
    {
        return $this->fetch(new GetAdvancedStatRadioRequest($options));
    }

    /**
     * Get all nbr pathloss for a customer and band: GET /telemetry/v1/nbr_pathloss_all/{band}.
     *
     * @return ListResource<NbrPathloss>
     */
    public function getAllNbrPathloss(string $band): ListResource
    {
        return new ListResource($this->connector, NbrPathloss::class, fn (Query $query) => new GetAllNbrPathlossRequest($band, $query));
    }

    /**
     * Get all radar and noise RF events of a tenant: GET /telemetry/v1/priority_rf_events_all.
     *
     * @return ListResource<PriorityRfEvents>
     */
    public function getAllPriorityRfEvents(): ListResource
    {
        return new ListResource($this->connector, PriorityRfEvents::class, fn (Query $query) => new GetAllPriorityRfEventsRequest($query));
    }

    /**
     * Get all reporting radio for a customer: GET /telemetry/v1/reporting_radio_all.
     *
     * @return ListResource<ReportRadio>
     */
    public function getAllRepRadio(): ListResource
    {
        return new ListResource($this->connector, ReportRadio::class, fn (Query $query) => new GetAllRepRadioRequest($query));
    }

    /**
     * Get all RF events of a tenant id: GET /telemetry/v1/rf_events_all.
     *
     * @return ListResource<RfEvents>
     */
    public function getAllRfEvents(): ListResource
    {
        return new ListResource($this->connector, RfEvents::class, fn (Query $query) => new GetAllRfEventsRequest($query));
    }

    /**
     * Get all static radios for a customer: GET /telemetry/v1/static_radio_all.
     *
     * @return ListResource<StaticRadio>
     */
    public function getAllStaticRadios(): ListResource
    {
        return new ListResource($this->connector, StaticRadio::class, fn (Query $query) => new GetAllStaticRadiosRequest($query));
    }

    /**
     * Get history of a specific radio MAC: GET /telemetry/v1/history/{radio_mac}/{band}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getHistoryByRadioMac(string $radioMac, string $band, array $options = []): ?RadioHistoryList
    {
        return $this->fetch(new GetHistoryByRadioMacRequest($radioMac, $band, $options));
    }

    /**
     * Get nbr pathloss of a neighbor MAC heard by a specific radio MAC: GET /telemetry/v1/nbr_pathloss/{radio_mac}/{nbr_mac}/{band}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getNbrPathlossByNbrBand(string $radioMac, string $nbrMac, string $band, array $options = []): ?NbrPathloss
    {
        return $this->fetch(new GetNbrPathlossByNbrBandRequest($radioMac, $nbrMac, $band, $options));
    }

    /**
     * Get radar and noise RF events of a specific radio MAC: GET /telemetry/v1/priority_rf_events/{radio_mac}.
     *
     * @return ListResource<PriorityRfEvents>
     */
    public function getPriorityRfEventsByRadioMac(string $radioMac): ListResource
    {
        return new ListResource($this->connector, PriorityRfEvents::class, fn (Query $query) => new GetPriorityRfEventsByRadioMacRequest($radioMac, $query));
    }

    /**
     * Get all nbr pathloss for a customer and radio MAC: GET /telemetry/v1/nbr_pathloss_radio/{radio_mac}/{band}.
     *
     * @return ListResource<NbrPathloss>
     */
    public function getRadioAllNbrPathloss(string $radioMac, string $band): ListResource
    {
        return new ListResource($this->connector, NbrPathloss::class, fn (Query $query) => new GetRadioAllNbrPathlossRequest($radioMac, $band, $query));
    }

    /**
     * Get reporting radio of a specific radio MAC: GET /telemetry/v1/reporting_radio/{radio_mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRepRadioByRadioMac(string $radioMac, array $options = []): ?ReportRadio
    {
        return $this->fetch(new GetRepRadioByRadioMacRequest($radioMac, $options));
    }

    /**
     * Get RF events of a specific radio MAC: GET /telemetry/v1/rf_events/{radio_mac}.
     *
     * @return ListResource<RfEvents>
     */
    public function getRfEventsByRadioMac(string $radioMac): ListResource
    {
        return new ListResource($this->connector, RfEvents::class, fn (Query $query) => new GetRfEventsByRadioMacRequest($radioMac, $query));
    }
}
