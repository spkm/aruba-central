<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MACRegistration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Job;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Import MAC csv file: POST /network-config/v1alpha1/cnac-mac-reg/import.
 *
 * Body: file.
 */
class ImportMacCsvFileRequest extends WriteRequest
{
    protected ?string $dto = Job::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-mac-reg/import';
    }
}
