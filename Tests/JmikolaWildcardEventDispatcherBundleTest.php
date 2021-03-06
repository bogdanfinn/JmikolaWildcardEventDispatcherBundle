<?php

namespace Jmikola\WildcardEventDispatcherBundle\Tests;

use Jmikola\WildcardEventDispatcherBundle\JmikolaWildcardEventDispatcherBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class JmikolaWildcardEventDispatcherBundleTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldAddCompilerPass()
    {
        $bundle = new JmikolaWildcardEventDispatcherBundle();
        $container = new ContainerBuilder();

        $bundle->build($container);

        $passes = $container->getCompilerPassConfig()->getBeforeOptimizationPasses();
        $this->assertInstanceOf('Jmikola\WildcardEventDispatcherBundle\DependencyInjection\Compiler\SetInnerEventDispatcherPass', $passes[0]);
        $this->assertInstanceOf('Jmikola\WildcardEventDispatcherBundle\DependencyInjection\Compiler\ReplaceEventDispatcherPass', $passes[1]);
    }
}
