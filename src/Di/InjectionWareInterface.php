<?php
namespace PHPCasts\Yaf\Di;


interface InjectionWareInterface
{
    /**
     * 设置依赖注入容器
     *
     * @param $di
     *
     * @return Container
     */
    public function setDi($di);

    /**
     * 获取依赖注入容器
     *
     * @return Container
     */
    public function getDi();
}
