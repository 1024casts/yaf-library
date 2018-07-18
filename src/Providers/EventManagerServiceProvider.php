<?php

namespace PHPCasts\Yaf\Providers;

use PHPCasts\Yaf\Events\Manager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class EventManagerServiceProvider
 */
class EventManagerServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['eventsManager'] = $pimple['em'] = function () {
            return Manager::class;
        };
    }
}