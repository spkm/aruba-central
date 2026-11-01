<?php

namespace spkm\ArubaCentral\Classic\Resources\AppRf;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNApp;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNAppCat;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNStats;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNWebId;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNWebRep;
use spkm\ArubaCentral\Classic\Data\AppRf\IdToName;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\AppcategoriesGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\AppcategoryMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\ApplicationMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\ApplicationsGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\GetTopNStatsRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebcategoriesGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebcategoryMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebreputationMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebreputationsGetRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The AppRF IAP Meta Info API, from Aruba::appRf().
 *
 * @extends BaseResource<Data>
 */
class AppRfResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Gets Top N App categories: GET /apprf/v1/appcategories.
     *
     * @param  array<string, mixed>  $options
     */
    public function appcategoriesGet(array $options = []): ?ApprfTopNAppCat
    {
        return $this->fetch(new AppcategoriesGetRequest($options));
    }

    /**
     * Gets Application Category id to name mapping: GET /apprf/v1/metainfo/iap/appcategory/id_to_name.
     *
     * @param  array<string, mixed>  $options
     */
    public function appcategoryMappingGet(array $options = []): ?IdToName
    {
        return $this->fetch(new AppcategoryMappingGetRequest($options));
    }

    /**
     * Gets Application id to name mapping: GET /apprf/v1/metainfo/iap/application/id_to_name.
     *
     * @param  array<string, mixed>  $options
     */
    public function applicationMappingGet(array $options = []): ?IdToName
    {
        return $this->fetch(new ApplicationMappingGetRequest($options));
    }

    /**
     * Gets Top N Applications: GET /apprf/v1/applications.
     *
     * @param  array<string, mixed>  $options
     */
    public function applicationsGet(array $options = []): ?ApprfTopNApp
    {
        return $this->fetch(new ApplicationsGetRequest($options));
    }

    /**
     * Gets Top N Apprf Statistics (V2 Version): GET /apprf/datapoints/v2/topn_stats.
     *
     * @param  array<string, mixed>  $options
     */
    public function getTopNStats(array $options = []): ?ApprfTopNStats
    {
        return $this->fetch(new GetTopNStatsRequest($options));
    }

    /**
     * Gets Top N Web categories: GET /apprf/v1/webcategories.
     *
     * @param  array<string, mixed>  $options
     */
    public function webcategoriesGet(array $options = []): ?ApprfTopNWebId
    {
        return $this->fetch(new WebcategoriesGetRequest($options));
    }

    /**
     * Gets Web Category id to name mapping: GET /apprf/v1/metainfo/iap/webcategory/id_to_name.
     *
     * @param  array<string, mixed>  $options
     */
    public function webcategoryMappingGet(array $options = []): ?IdToName
    {
        return $this->fetch(new WebcategoryMappingGetRequest($options));
    }

    /**
     * Gets Web Reputation id to name mapping: GET /apprf/v1/metainfo/iap/webreputation/id_to_name.
     *
     * @param  array<string, mixed>  $options
     */
    public function webreputationMappingGet(array $options = []): ?IdToName
    {
        return $this->fetch(new WebreputationMappingGetRequest($options));
    }

    /**
     * Gets Top Web Reputations: GET /apprf/v1/webreputations.
     *
     * @param  array<string, mixed>  $options
     */
    public function webreputationsGet(array $options = []): ?ApprfTopNWebRep
    {
        return $this->fetch(new WebreputationsGetRequest($options));
    }
}
