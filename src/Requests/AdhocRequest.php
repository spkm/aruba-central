<?php

namespace spkm\ArubaCentral\Requests;

use Saloon\Enums\Method;

/**
 * Any call to Central by method and path, for endpoints the package has no request for. dto() gives the decoded
 * body, or one record as an array when built with the ONE shape. AdhocBodyRequest carries a JSON body too.
 */
class AdhocRequest extends ArubaRequest
{
    /**
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(
        protected Method $method,
        protected string $path,
        protected array $parameters = [],
        string $shape = self::RAW,
        string $resultKey = '',
    ) {
        $this->responseShape = $shape;
        $this->resultKey = $resultKey;
        $this->safe = $method === Method::GET;
    }

    public function resolveEndpoint(): string
    {
        return '/'.ltrim($this->path, '/');
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->parameters;
    }
}
