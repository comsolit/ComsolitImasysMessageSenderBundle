<?php
namespace Comsolit\ImasysMessageSenderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('comsolit_imasys_message_sender');

        $rootNode
            ->children()
                ->scalarNode('user')->end()
                ->scalarNode('pw')->end()
                ->scalarNode('apiurl')->end()
                ->scalarNode('originator')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}