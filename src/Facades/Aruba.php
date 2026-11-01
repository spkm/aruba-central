<?php

namespace spkm\ArubaCentral\Facades;

use Illuminate\Support\Facades\Facade;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ArubaCentral\ArubaPaginator;
use spkm\ArubaCentral\ArubaService;
use spkm\ArubaCentral\Central\CentralConnector;
use spkm\ArubaCentral\Classic\ClassicConnector;
use spkm\ArubaCentral\Query\Builder;

/**
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\AccessPointsResource accessPoints()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\AfcResource afc()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\AirMatchResource airMatch()
 * @method static \spkm\ArubaCentral\Central\Resources\Notifications\AlertsResource alerts()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\ApplicationsResource applications()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\AuditsResource audits()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\ClientOnboardingResource clientOnboarding()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\ClientsResource clients()
 * @method static \spkm\ArubaCentral\Central\Resources\Config\ConfigResources configuration()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\DevicesResource devices()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\FirewallSessionsResource firewallSessions()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\FirmwareResource firmware()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\FloorPlansResource floorPlans()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\GatewaysResource gateways()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\GdprResource gdpr()
 * @method static \spkm\ArubaCentral\Central\Resources\Notifications\InsightsResource insights()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\LocationResource location()
 * @method static \spkm\ArubaCentral\Central\Resources\Msp\MspResource msp()
 * @method static \spkm\ArubaCentral\Central\Resources\Notifications\NotificationRulesResource notificationRules()
 * @method static \spkm\ArubaCentral\Central\Resources\Reporting\ReportsResource reports()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\SiteHealthResource siteHealth()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\SubscriptionsResource subscriptions()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\SwitchesResource switches()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\ThreatsResource threats()
 * @method static \spkm\ArubaCentral\Central\Resources\Monitoring\TopologyResource topology()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\TransitionManagerResource transitionManager()
 * @method static \spkm\ArubaCentral\Central\Resources\Troubleshooting\TroubleshootingResources troubleshooting()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\WebhooksResource webhooks()
 * @method static \spkm\ArubaCentral\Central\Resources\Services\WidsResource wids()
 * @method static CentralConnector central(?string $connection = null)
 * @method static ClassicConnector classic(?string $connection = null)
 * @method static CentralConnector connection(string $name)
 * @method static Response send(Request $request)
 * @method static ArubaPaginator paginate(Request $request, ?int $perPage = null)
 * @method static Builder<\spkm\ArubaCentral\Data\Data> from(string $path, string $resultKey = 'items')
 * @method static Response get(string $path, array<string, mixed> $query = [])
 * @method static Response post(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response put(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response patch(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response delete(string $path, array<string, mixed> $query = [])
 *
 * @see ArubaService
 * @see CentralConnector
 */
class Aruba extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'aruba';
    }
}
