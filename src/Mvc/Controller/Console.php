<?php

namespace PHPCasts\Yaf\Mvc\Controller;

use PHPCasts\Yaf\Exceptions\RuntimeException;
use PHPCasts\Yaf\Log\Log;

/**
 * Console 相关的基础控制器
 */
class Console extends Base
{

    /* vars */
    protected $objLockFd = NULL;
    /**
     * 子类继承后重写
     * @var string
     */
    protected $strLockFile = '/tmp/default_console.lock';
    protected $intStartTime = 0;
    protected $intOverTime = 0;
    protected $intNowTime = 0;
    protected $intDuration = 60;    // 默认执行时长

    public function init()
    {
        $this->intStartTime = strtotime(strval(date('YmdHi') . '00'));
        $this->intOverTime = $this->intStartTime + $this->intDuration; // 执行时长

        $ret = $this->_lock();
        if ($ret === false) {
            Log::warning("lock failed");
            return false;
        }

        return true;
    }

    public function over()
    {
        $ret = $this->_unLock();
        if ($ret === false) {
            Log::warning("unlock failed");
            return false;
        }
        return true;
    }

    private function _lock()
    {
        $this->objLockFd = fopen($this->strLockFile, "w");
        if ($this->objLockFd === false) {
            Log::warning("open lock file failed");
            return false;
        }

        $ret = flock($this->objLockFd, LOCK_EX | LOCK_NB);
        while ($ret === false && $this->intNowTime < $this->intOverTime) {
            $this->intNowTime = time();
            $ret = flock($this->objLockFd, LOCK_EX | LOCK_NB);
            if ($ret !== false) {
                return true;
            }

            sleep(1);
        }
        return true;
    }

    private function _unLock()
    {
        if (is_null($this->objLockFd)) {
            return true;
        }

        flock($this->objLockFd, LOCK_UN);
        fclose($this->objLockFd);

        return true;
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
     * @param array $varArray
     * @return void
     * @throws RuntimeException
     */
    public function display($actionName, array $varArray = null)
    {
        throw new RuntimeException('Abandon method!');
    }
}