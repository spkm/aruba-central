<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\ActionCommand;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Action command for enroll est certificate: POST /tools/action_cmd/device/{serial}/enroll_est_cert.
 *
 * Body: est_profile_name, cert_name.
 */
class SendEnrollPkiCertificateSwitchRequest extends WriteRequest
{
    protected ?string $dto = ActionCommand::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/tools/action_cmd/device/'.rawurlencode((string) $this->serial).'/enroll_est_cert';
    }
}
