<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * RMQ message generates southbound test action-msg: POST /deployer/v1/trigger_test_action_msg.
 *
 * Query options: tenant_id.
 */
class TestActionMsgRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $mac, protected string $opmode, protected string $cbw, protected int $chan, protected int $eirp, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/deployer/v1/trigger_test_action_msg';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['mac' => $this->mac, 'opmode' => $this->opmode, 'cbw' => $this->cbw, 'chan' => $this->chan, 'eirp' => $this->eirp, ...parent::defaultQuery()];
    }
}
