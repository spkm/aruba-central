<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Trigger test-config update: POST /deployer/v1/test_config_update.
 *
 * Query options: tenant_id.
 */
class TestConfigRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $disallowActionMsg, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/deployer/v1/test_config_update';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['disallow_action_msg' => $this->disallowActionMsg, ...parent::defaultQuery()];
    }
}
