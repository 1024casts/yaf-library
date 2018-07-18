<?php

namespace PHPCasts\Yaf\Providers;

use Yaf\Session;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class SessionServiceProvider
 */
class SessionServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['session'] = function () {
            return Session::getInstance();
        };
    }
}