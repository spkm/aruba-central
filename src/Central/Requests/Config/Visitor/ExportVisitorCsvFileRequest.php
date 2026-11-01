<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Visitor;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Export visitor csv file: GET /network-config/v1alpha1/cnac-visitor/export.
 *
 * Query options: identity-store-id, sort, search.
 */
class ExportVisitorCsvFileRequest extends ItemRequest
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
        return '/network-config/v1alpha1/cnac-visitor/export';
    }
}
