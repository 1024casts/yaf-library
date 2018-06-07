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
        return $this->offsetGet($id);
    }

    public function has($id)
    {
        return $this->offsetExists($id);
    }

    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider){
            parent::register(new $provider());
        }
    }
}