<?php
namespace PHPCasts\Views\Adapter;

use Illuminate\View\Factory;
use Yaf\View_Interface;

class BladeAdapter extends Factory implements View_Interface
{

    /**
     * Assign values to View engine, then the value can access directly by name in template.
     *
     * @link http://www.php.net/manual/en/yaf-view-interface.assign.php
     *
     * @param string|array $name
     * @param mixed $value
     * @return bool
     */
    function assign($name, $value = NULL)
    {
        // TODO: Implement assign() method.
    }

    /**
     * Render a template and output the result immediately.
     *
     * @link http://www.php.net/manual/en/yaf-view-interface.display.php
     *
     * @param string $tpl
     * @param array $tpl_vars
     * @return bool
     */
    function display($tpl, $tpl_vars = NULL)
    {
        // TODO: Implement display() method.
        echo $this->render($tpl, $tpl_vars);
    }

    /**
     * @link http://www.php.net/manual/en/yaf-view-interface.getscriptpath.php
     *
     * @return string
     */
    function getScriptPath()
    {
        // TODO: Implement getScriptPath() method.
    }

    /**
     * Render a template and return the result.
     *
     * @link http://www.php.net/manual/en/yaf-view-interface.render.php
     *
     * @param string $tpl
     * @param array $tpl_vars
     * @return string
     */
    function render($tpl, $tpl_vars = NULL)
    {
        // TODO: Implement render() method.
        return $this->make($tpl, $tpl_vars)->render();
    }

    /**
     * Set the templates base directory, this is usually called by \Yaf\Dispatcher
     *
     * @link http://www.php.net/manual/en/yaf-view-interface.setscriptpath.php
     *
     * @param string $template_dir An absolute path to the template directory, by default, \Yaf\Dispatcher use application.directory . "/views" as this parameter.
     */
    function setScriptPath($template_dir)
    {
        // TODO: Implement setScriptPath() method.
    }
}