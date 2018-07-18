<?php
/**
 * 服务容器
 *
 * @filename: ServiceContainer.php
 */

namespace PHPCasts\Yaf;

use PHPCasts\Yaf\Providers\CacheServiceProvider;
use PHPCasts\Yaf\Providers\ConfigServiceProvider;
use PHPCasts\Yaf\Providers\EventManagerServiceProvider;
use PHPCasts\Yaf\Providers\LogServiceProvider;
use PHPCasts\Yaf\Providers\RedisServiceProvider;
use PHPCasts\Yaf\Providers\SessionServiceProvider;
use Pimple\Container;
use Psr\Container\ContainerInterface;

class ServiceContainer extends Container implements ContainerInterface
{

    /**
     * @var array
     */
    protected $providers = [];

    public function __construct(array $providers = [])
    {
        // system default
        $this->registerProviders($this->getProviders());

        // custom
        parent::__construct($providers);
    }

    public function getProviders()
    {
        return array_merge([
            ConfigServiceProvider::class,
            SessionServiceProvider::class,
            LogServiceProvider::class,
            RedisServiceProvider::class,
            CacheServiceProvider::class,
            EventManagerServiceProvider::class,
        ], $this->providers);
    }

    public function addProvider($provider)
    {
        array_push($this->providers, $provider);

        return $this;
    }

    public function setProviders(array $providers)
    {
        $this->providers = [];

        foreach ($providers as $provider) {
            $this->addProvider($provider);
        }
    }

    public function get($id)
    {
        try {
            return $this->offsetGet($id);
        } catch (\InvalidArgumentException $exception) {
            // 异常处理...
        }
    }

    public function has($id)
    {
        return $this->offsetExists($id);
    }

    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider){
            parent::register(new $provider());
        }
    }
}