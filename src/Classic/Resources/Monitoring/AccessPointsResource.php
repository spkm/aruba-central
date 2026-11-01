<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\AP;
use spkm\ArubaCentral\Classic\Data\Monitoring\APBssid;
use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Classic\Data\Monitoring\RFSummary;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNAp;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\DeleteApRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApRfSummaryRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApsBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetBssidsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The AP API, from Aruba::monitoring()->accessPoints().
 *
 * @extends Builder<AP>
 */
class AccessPointsResource extends Builder
{
    protected string $idField = 'serial';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AP::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetApRequest((string) $id);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteApRequest((string) $id, $options);
    }

    /**
     * AP RF Summary: GET /monitoring/v3/aps/{serial}/rf_summary.
     *
     * @return ListResource<RFSummary>
     */
    public function rfSummary(string $serial): ListResource
    {
        return new ListResource($this->connector, RFSummary::class, fn (Query $query) => new GetApRfSummaryRequest($serial, $query));
    }

    /**
     * Top N AP Details: GET /monitoring/v2/aps/bandwidth_usage/topn.
     *
     * @return ListResource<TopNAp>
     */
    public function topByBandwidth(): ListResource
    {
        return new ListResource($this->connector, TopNAp::class, fn (Query $query) => new GetApsBandwidthUsageTopnRequest($query));
    }

    /**
     * AP Bandwidth Usage: GET /monitoring/v3/aps/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function bandwidthUsage(): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetApsBandwidthUsageRequest($query));
    }

    /**
     * List BSSIDs: GET /monitoring/v2/bssids.
     *
     * @return ListResource<APBssid>
     */
    public function bssids(): ListResource
    {
        return new ListResource($this->connector, APBssid::class, fn (Query $query) => new GetBssidsRequest($query));
    }
}
