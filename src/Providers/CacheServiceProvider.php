<?php

namespace PHPCasts\Yaf\Providers;

use PHPCasts\Yaf\Caches\Cache;
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
        $pimple['cache'] = function () {
            $cache = new Cache();

            return $cache::getInstance();
        };

    }
}