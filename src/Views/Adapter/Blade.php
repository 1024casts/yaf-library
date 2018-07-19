<?php

namespace PHPCasts\Yaf\Views\Adapter;

/**
 * Yaf 模板类(Laravel Blade)
 * Class Blade
 */
class Blade implements \Yaf\View_Interface
{
    protected $fileViewFinder;
    protected $bladeCompiler;
    protected $engineResolver;
    protected $scriptPath;

    public function __construct()
    {
        $this->setFileViewFinder();
        $this->setBladeCompiler();
    }

    /**
     * 设置视图文件路径
     */
    public function setFileViewFinder()
    {
        $this->fileViewFinder = new \Illuminate\View\FileViewFinder($this->getFileSystem(), $this->getPath());
    }

    /**
     * 设置缓存文件路径
     */
    public function setBladeCompiler()
    {
        $this->bladeCompiler = new \Illuminate\View\Compilers\BladeCompiler(
            $this->getFileSystem(),
            $this->getCachePath()
        );
    }

    /**
     * 获取文件系统
     *
     * @return \Illuminate\Filesystem\Filesystem
     */
    protected function getFileSystem()
    {
        return new \Illuminate\Filesystem\Filesystem();
    }

    /**
     * 获取视图文件路径
     *
     * @return array
     */
    protected function getPath()
    {
        return [APP_PATH . '/views'];
    }

    /**
     * 缓存文件路径
     *
     * @return string
     */
    protected function getCachePath()
    {
        $cacheDir = STORAGE_PATH . '/views/cache';

        if (!file_exists($cacheDir)){
            mkdir($cacheDir, 0777, true);
        }

        return $cacheDir;
    }

    /**
     * @param string $view
     * @param array  $data
     * @return bool|void
     */
    public function display($view, $data = [])
    {
        echo $this->getFactory()->make($this->replaceView($view), $data);

        return true;
    }

    /**
     * @param string $view
     * @param array  $data
     * @return \Illuminate\Contracts\View\View
     */
    public function render($view, $data = [])
    {
        return $this->getFactory()->make($this->replaceView($view), $data);
    }

    /**
     * 无需实现
     * @param string $name
     * @param null   $value
     * @return bool|void
     */
    public function assign($name, $value = null)
    {
    }

    public function setScriptPath($tplDir)
    {
        $this->scriptPath = $tplDir;
    }

    public function getScriptPath()
    {
        return $this->scriptPath;
    }

    /**
     * 获取视图工厂类
     *
     * @return \Illuminate\View\Factory
     */
    public function getFactory()
    {
        return new \Illuminate\View\Factory($this->getEngineResolver(), $this->fileViewFinder, $this->getDispatcher());
    }

    /**
     * @return \Illuminate\View\Engines\EngineResolver
     * 获取视图引擎
     */
    public function getEngineResolver()
    {
        $resolver = new \Illuminate\View\Engines\EngineResolver();
        foreach (['file', 'php', 'blade'] as $engine) {
            $this->{'register' . ucfirst($engine) . 'Engine'}($resolver);
        }

        return $resolver;
    }

    /**
     * Register the file engine implementation.
     *
     * @param  \Illuminate\View\Engines\EngineResolver $resolver
     * @return void
     */
    public function registerFileEngine($resolver)
    {
        $resolver->register(
            'file',
            function () {
                return new \Illuminate\View\Engines\FileEngine();
            }
        );
    }

    /**
     * Register the PHP engine implementation.
     *
     * @param  \Illuminate\View\Engines\EngineResolver $resolver
     * @return void
     */
    public function registerPhpEngine($resolver)
    {
        $resolver->register(
            'php',
            function () {
                return new \Illuminate\View\Engines\PhpEngine();
            }
        );
    }

    public function getDispatcher()
    {
        return new \Illuminate\Events\Dispatcher();
    }

    /**
     * Register the Blade engine implementation.
     *
     * @param  \Illuminate\View\Engines\EngineResolver $resolver
     * @return void
     */
    public function registerBladeEngine($resolver)
    {
        $resolver->register(
            'blade',
            function () {
                return new \Illuminate\View\Engines\CompilerEngine($this->bladeCompiler);
            }
        );
    }

    public function replaceView($view = '')
    {
        return str_replace('.blade.php', ' ', $view);
    }
}