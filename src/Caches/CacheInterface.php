<?php

namespace PHPCasts\Yaf\Caches;

/**
 * 缓存接口
 */
interface CacheInterface extends \Psr\SimpleCache\CacheInterface
{

    /**
     * 设置缓存有效期
     *
     * @param string $key 缓存Key
     * @param int $expire 有效期, 0为不过期
     * @return bool
     */
    public function expireAfter($key, $expire = 0);

    /**
     * 设置缓存有效期到某个时间为止
     *
     * @param string $key 缓存Key
     * @param int $time 有效期,时间戳
     * @return bool
     */
    public function expiresAt($key, $time = 0);

    /**
     * 递增某个Key,不存在则自动创建
     *
     * @param string $key 缓存Key
     * @param int $offset 增加的值
     * @return mixed
     */
    public function increment($key, $offset = 1);

    /**
     * 递减某个Key,不存在则自动创建
     *
     * @param string $key 缓存Key
     * @param int $offset 减少的值
     * @return mixed
     */
    public function decrement($key, $offset = 1);

}