<?php
namespace PHPCasts\Yaf\Di;

interface ContainerInterface
{
    function set($name, $service);
    function get($name);
}