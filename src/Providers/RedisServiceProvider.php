<?php

namespace PHPCasts\Yaf\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class RedisServiceProvider
 */
class RedisServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['redis'] = function ($app) {
            $config = $app['config']['redis']['default'];

            $redis = new \Redis();
            $redis->connect($config['host'], $config['port'], $config['timeout']);

            return $redis;
        };
    }
}