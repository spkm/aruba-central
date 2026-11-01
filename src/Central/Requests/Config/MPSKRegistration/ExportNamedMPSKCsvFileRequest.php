<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Export Named MPSK csv file: GET /network-config/v1alpha1/cnac-named-mpsk-reg/export.
 *
 * Query options: sort, search.
 */
class ExportNamedMPSKCsvFileRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $identityStoreId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-named-mpsk-reg/export';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['identity-store-id' => $this->identityStoreId, ...parent::defaultQuery()];
    }
}
