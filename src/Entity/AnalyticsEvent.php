<?php

declare(strict_types=1);

namespace M10c\UnlockedAnalyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity]
#[ORM\Table(name: 'analytics_event')]
#[ORM\Index(name: 'anonymous_id_idx', columns: ['anonymous_id'])]
#[ORM\Index(name: 'event_idx', columns: ['event'])]
#[ORM\Index(name: 'timestamp_idx', columns: ['timestamp'])]
#[ORM\Index(name: 'user_id_idx', columns: ['user_id'])]
class AnalyticsEvent
{
    public const TYPE_TRACK = 'track';
    public const TYPE_SCREEN = 'screen';

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    #[ORM\Column(type: 'uuid', unique: true)]
    public UuidInterface $id;

    #[ORM\ManyToOne(targetEntity: AnalyticsRequest::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    public ?AnalyticsRequest $request = null;

    #[ORM\Column(nullable: true)]
    public ?string $anonymousId = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    public ?bool $contextActive = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextAppName = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextAppVersion = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextAppBuild = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextCampaignName = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextCampaignSource = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextCampaignMedium = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextCampaignTerm = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextCampaignContent = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextDeviceId = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextDeviceAdvertisingId = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextDeviceManufacturer = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextDeviceModel = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextDeviceName = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextDeviceType = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextDeviceVersion = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextIp = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLibraryName = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLibraryVersion = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLocale = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLocationCity = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLocationCountry = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLocationLatitude = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLocationLongitude = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLocationRegion = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextLocationSpeed = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    public ?bool $contextNetworkBluetooth = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextNetworkCarrier = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    public ?bool $contextNetworkCellular = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    public ?bool $contextNetworkWifi = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextOsName = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextOsVersion = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextPagePath = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextPageReferrer = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextPageSearch = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextPageTitle = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextPageUrl = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextReferrerType = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextReferrerName = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextReferrerUrl = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextReferrerLink = null;

    #[ORM\Column(type: 'smallint', nullable: true)]
    public ?int $contextScreenWidth = null;

    #[ORM\Column(type: 'smallint', nullable: true)]
    public ?int $contextScreenHeight = null;

    #[ORM\Column(type: 'float', nullable: true)]
    public ?float $contextScreenDensity = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextTimezone = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextGroupId = null;

    #[ORM\Column(nullable: true)]
    public ?string $contextUserAgent = null;

    #[ORM\Column]
    public string $type;

    #[ORM\Column(nullable: true)]
    public ?string $event = null;

    #[ORM\Column(nullable: true)]
    public ?string $name = null;

    /** @var ?array<string, mixed> */
    #[ORM\Column(type: 'json', nullable: true)]
    public ?array $properties = null;

    #[ORM\Column(type: 'datetimetz')]
    public \DateTimeInterface $timestamp;

    #[ORM\Column(nullable: true)]
    public ?string $userId = null;
}
