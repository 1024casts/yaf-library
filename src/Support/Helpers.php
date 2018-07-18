<?php

use Yaf\Registry;

if (!function_exists('app')) {
    /**
     * @param $make
     * @return \PHPCasts\Yaf\ServiceContainer
     */
    function app($make = null)
    {
        $container = Registry::get('container');

        if (is_null($make)) {
            return $container;
        }

        return $container[$make];
    }
}