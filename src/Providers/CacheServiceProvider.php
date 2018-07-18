<?php

namespace PHPCasts\Yaf\Providers;

use PHPCasts\Yaf\Caches\Redis;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class CacheServiceProvider
 */
class CacheServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['cache'] = function ($app) {
            return new Redis($app['redis']);
        };
    }
}