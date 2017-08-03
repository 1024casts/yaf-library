<?php
namespace PHPCasts\Di;

interface ContainerInterface
{
    function set($name, $service);
    function get($name);
}