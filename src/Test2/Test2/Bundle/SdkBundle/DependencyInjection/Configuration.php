<?php

namespace Test2\Test2\Bundle\SdkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Test2Test2SdkBundle semantical configuration class.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     *
     * @see http://symfony.com/doc/current/components/config/definition.html
     *
     * @example to create configuration tree, use theses lines :
     *      $treeBuilder = new TreeBuilder();
     *      $treeBuilder->root('test2_test2_sdk')
     *          ->children()
     *              ->scalarNode('...')
     *                  ->isRequired()
     *              ->end()
     *              ->arrayNode()
     *                  ->addDefaultsIfNotSet()
     *                  ->children()
     *                       // more nodes here
     *                  ->end()
     *              ->end()
     *          ->end()
     *      ;
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('test2_test2_sdk');

        return $treeBuilder;
    }
}
