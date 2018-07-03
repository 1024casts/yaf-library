<?php

namespace PHPCasts\Yaf\Mvc\Model;

/**
 * Trait RedisTrait
 *
 * @property \Redis $redis
 */
trait RedisTrait
{
    protected $redisNodeName = 'default';
    protected $redisExpired = 3600;
}
