<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MACRegistration;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Export MAC csv file: GET /network-config/v1alpha1/cnac-mac-reg/export.
 *
 * Query options: sort, search.
 */
class ExportMacCsvFileRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-mac-reg/export';
    }
}
