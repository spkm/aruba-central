<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaStaticTagsUsage;
use spkm\ArubaCentral\Central\Requests\Config\StaticTags\GetStaticTagsUsageRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Static Tags API, from Aruba::configuration()->nacStaticTags().
 *
 * @extends BaseResource<Data>
 */
class NacStaticTagsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get static tags usage information: POST /network-config/v1alpha1/cnac-static-tags/usage.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function getStaticTagsUsage(array|Data $attributes = [], array $options = []): ?CdaStaticTagsUsage
    {
        return $this->fetch(new GetStaticTagsUsageRequest($this->payloadOf($attributes), $options));
    }
}
