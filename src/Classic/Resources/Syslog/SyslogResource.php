<?php

namespace spkm\ArubaCentral\Classic\Resources\Syslog;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Syslog\Flowlist;
use spkm\ArubaCentral\Classic\Data\Syslog\FlowStatusList;
use spkm\ArubaCentral\Classic\Data\Syslog\OFCFlowStatus;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\CheckStatusListRequest;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\CheckStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\EnableWildcardFlowListRequest;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\EnableWildcardFlowRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Flowhandler API, from Aruba::syslog().
 *
 * @extends BaseResource<Data>
 */
class SyslogResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Check Status of Enabled Flow SerialID: GET /ofcapi/v1/syslog/flow/status/{serial_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function checkStatus(string $serialId, array $options = []): ?OFCFlowStatus
    {
        return $this->fetch(new CheckStatusRequest($serialId, $options));
    }

    /**
     * Check Status of Syslog App for given SerialIDs.: POST /ofcapi/v1/syslog/flows/status/device_list.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function checkStatusList(array|Data $attributes = [], array $options = []): ?FlowStatusList
    {
        return $this->fetch(new CheckStatusListRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Enable/Disable the Syslog App.: POST /ofcapi/v1/syslog/flow.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function enableWildcardFlow(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new EnableWildcardFlowRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Enable Syslog App on a list of given device SerialIDs.: POST /ofcapi/v1/syslog/flows/{enable}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function enableWildcardFlowList(string $enable, array|Data $attributes = [], array $options = []): ?Flowlist
    {
        return $this->fetch(new EnableWildcardFlowListRequest($enable, $this->payloadOf($attributes), $options));
    }
}
