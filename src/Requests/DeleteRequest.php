<?php

namespace spkm\ArubaCentral\Requests;

use Saloon\Enums\Method;

/**
 * A DELETE of one record. Central answers 204, or 200 with a status.
 */
abstract class DeleteRequest extends ArubaRequest
{
    protected Method $method = Method::DELETE;

    protected string $responseShape = self::ONE;

    protected bool $safe = false;

    /** @var array<string, mixed> */
    protected array $options;

    /**
     * @param  array<string, mixed>  $options  Query options the operation documents.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
