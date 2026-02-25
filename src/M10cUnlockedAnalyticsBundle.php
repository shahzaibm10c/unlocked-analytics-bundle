<?php

declare(strict_types=1);

namespace M10c\UnlockedAnalyticsBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class M10cUnlockedAnalyticsBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->booleanNode('anonymize_ip')->defaultFalse()->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $builder->setParameter('m10c_unlocked_analytics.anonymize_ip', $config['anonymize_ip']);

        $container->import('../config/services.yaml');
    }
}
