<?php

namespace spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Gdpr\Gdpr;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add Gdpr opt out client: POST /gdpr/v1/opt_out_clients.
 *
 * Body: mac.
 */
class AddGdprApiRequest extends WriteRequest
{
    protected ?string $dto = Gdpr::class;

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
        return '/gdpr/v1/opt_out_clients';
    }
}
