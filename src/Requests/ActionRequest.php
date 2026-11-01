<?php

namespace spkm\ArubaCentral\Requests;

/**
 * A POST, PUT, PATCH or DELETE that does something without sending a record: reboot, clear, enable, start and the
 * like. Central answers with a status, a task to poll, or nothing.
 */
abstract class ActionRequest extends ArubaRequest
{
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
