<?php

namespace PHPCasts\Yaf\Mvc\Controller;

use Yaf\Controller_Abstract;
use Yaf\Dispatcher;
use Yaf\Registry;

/**
 * 基础控制器,所有控制器都应该实现此类
 */
abstract class Base extends Controller_Abstract
{
    use BaseTrait;
}