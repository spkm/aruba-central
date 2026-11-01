<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Telemetry\BootstrapRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Telemetry\PurgeRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Telemetry API, from Aruba::airMatch()->telemetry().
 *
 * @extends BaseResource<Data>
 */
class TelemetryResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Bootstrap: POST /telemetry/v1/bootstrap.
     *
     * @param  array<string, mixed>  $options
     */
    public function bootstrap(string $bootstrapType, array $options = []): mixed
    {
        return $this->fetch(new BootstrapRequest($bootstrapType, $options));
    }

    /**
     * Purge: POST /telemetry/v1/purge.
     *
     * @param  array<string, mixed>  $options
     */
    public function purge(string $purgeType, array $options = []): mixed
    {
        return $this->fetch(new PurgeRequest($purgeType, $options));
    }
}
