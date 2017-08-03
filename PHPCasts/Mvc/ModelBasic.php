<?php

namespace PHPCasts\Mvc;

use PHPCasts\Di\InjectionWareInterface;
use PHPCasts\Di\InjectionWareTrait;
use PHPCasts\Caches\Memory;
use PHPCasts\Events\ManagerWareTrait;
use PHPCasts\Mvc\Model\CacheTrait;
use PHPCasts\Mvc\Model\DbTrait;
use PHPCasts\Mvc\Model\RedisTrait;

class ModelBasic implements InjectionWareInterface
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
