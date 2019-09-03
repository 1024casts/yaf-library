<?php

namespace PHPCasts\Yaf\Mvc\Controller;

use PHPCasts\Yaf\Exceptions\RuntimeException;
use PHPCasts\Yaf\Http\Support\Defines\Code;
use PHPCasts\Yaf\Http\Support\OutputTrait;
use Yaf\Exception\LoadFailed\Action as FailedAction;

/**
 * Action相关的基础控制器
 */
abstract class Action extends \Yaf\Action_Abstract
{
    use BaseTrait;
    use OutputTrait;

    /**
     * 初始化
     */
    public function init()
    {
        // 在controller或service里throw new Exception之后,这里会进行捕获
        // 比如参数检查,用户登录检查抛异常之后,最后还会以类似调用$this->error()的方式返回json。
        set_exception_handler([$this, 'handleException']);

        parent::init();
    }

    /**
     * 异常处理
     *
     * @param \Exception $e 异常
     * @return bool
     */
    public function handleException($e)
    {
        if ($e instanceof FailedAction) {
            return $this->error(Code::NOT_FOUND);
        }

        return $this->error($e->getCode(), $e->getMessage());
    }

    /**
     * 获取视图
     *
     * @throws RuntimeException
     */
    public function getView()
    {
        throw new RuntimeException('Abandon method!');
    }

    /**
     * 渲染模板并输出
     *
     * @param string $actionName
     * @param array  $varArray
     *
     * @return bool|void
     * @throws RuntimeException
     */
    public function display($actionName, array $varArray = null)
    {
        throw new RuntimeException('Abandon method!');
    }
}
