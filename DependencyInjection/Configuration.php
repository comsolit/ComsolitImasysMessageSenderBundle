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
                ->scalarNode('password')->end()
                ->scalarNode('portal_list_server_adress')->end()
                ->scalarNode('originator')->end()
                ->booleanNode('disable_delivery')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}