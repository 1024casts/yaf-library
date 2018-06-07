<?php
/**
 * 服务容器
 *
 * @filename: ServiceContainer.php
 */

namespace PHPCasts\Yaf;

use Pimple\Container;
use Psr\Container\ContainerInterface;

class ServiceContainer extends Container implements ContainerInterface
{

    protected $providers;

    public function __construct(array $providers = [])
    {
        if ($providers) {
            parent::__construct($providers);
        }

        $this->registerProviders($this->getProviders());
    }

    public function getProviders()
    {
        return $this->providers;
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