<?php
namespace PHPCasts\Yaf\Di;

use PHPCasts\Events\Manager;
use Psr\Log\LoggerInterface;

/**
 * Class InjectionWareTrait
 *
 * @property Container $di
 * @property Manager $eventsManager
 * @property LoggerInterface $logger
 */
trait InjectionWareTrait
{
    /**
     * 设置依赖注入容器
     *
     * @param ContainerInterface $di
     */
    public function setDi($di)
    {
        $this->di = $di;
    }

    /**
     * 获取依赖注入容器
     *
     * @return ContainerInterface
     */
    public function getDi()
    {
        return isset($this->di) ? $this->di : Container::getDefault();
    }

    public function __get($name)
    {
        if ($name == 'di') {
            return $this->di = $this->getDi();
        }

        return $this->di[$name];
    }
}