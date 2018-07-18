<?php

namespace PHPCasts\Yaf\Providers;

use Yaf\Dispatcher;
use PHPCasts\Yaf\Log\LoggerWrapper;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class LogServiceProvider
 */
class LogServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['logger'] = $pimple['log'] = function () {
            if (strtolower(Dispatcher::getInstance()->getRequest()->getModuleName()) == 'console'
                && getenv('LOG_TO_CONSOLE')
            ) {
                return new Logger('console-name', [new StreamHandler('php://output')]);
            } else {
                return new LoggerWrapper();
            }
        };
    }
}