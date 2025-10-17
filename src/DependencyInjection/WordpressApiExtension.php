<?php

namespace Francoisvaillant\WordpressApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class WordpressApiExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('wordpress_api.base_url', $config['base_url']);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        // 🧩 Vérifie que ce fichier existe bien à ce chemin exact :
        $loader->load('services.yaml');
    }

    public function getAlias(): string
    {
        return 'wordpress_api';
    }
}
