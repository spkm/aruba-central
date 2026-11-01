<?php

namespace spkm\ArubaCentral\Classic\Resources\AiOps;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The AIOps APIs, from Aruba::aiOps().
 *
 * @extends BaseResource<Data>
 */
class AiOpsResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The Wi-Fi Connectivity Dashboard API.
     */
    public function connectivity(): ConnectivityResource
    {
        return new ConnectivityResource($this->connector);
    }

    /**
     * The AI Insight Details API.
     */
    public function insightDetails(): InsightDetailsResource
    {
        return new InsightDetailsResource($this->connector);
    }

    /**
     * The AI Insights List API.
     */
    public function insights(): InsightsResource
    {
        return new InsightsResource($this->connector);
    }
}
