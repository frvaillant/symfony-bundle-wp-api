<?php

namespace Francoisvaillant\WordpressApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('wordpress_api');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('base_url')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
