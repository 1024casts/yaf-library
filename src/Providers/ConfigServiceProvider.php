<?php

namespace PHPCasts\Yaf\Providers;

use Yaf\Registry;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ConfigServiceProvider
 */
class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['config'] = function () {
            return Registry::get('config');
        };
    }
}