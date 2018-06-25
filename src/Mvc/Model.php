<?php

namespace PHPCasts\Mvc;

use PHPCasts\Yaf\Di\InjectionWareInterface;
use PHPCasts\Yaf\Di\InjectionWareTrait;
use PHPCasts\Yaf\Caches\Memory;
use PHPCasts\Yaf\Events\ManagerWareTrait;
use PHPCasts\Mvc\Model\CacheTrait;
use PHPCasts\Mvc\Model\DbTrait;
use PHPCasts\Mvc\Model\RedisTrait;

class Model implements InjectionWareInterface
{
    use InjectionWareTrait;
    use ManagerWareTrait;
    use DbTrait;
    use CacheTrait;
    use RedisTrait;

    /**
     * @var Memory
     */
    protected $localCache;

    public function __construct()
    {
        // @todo 更好的封装
        $this->localCache = new Memory();

        $this->init();
    }

    protected function init()
    {

    }
}
