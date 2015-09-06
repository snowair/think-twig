<?php

namespace Think\Template\Driver;

/**
 * Twig模板引擎驱动
 */
class Twig {

    static protected $instance;

    static public function getInstance()
    {
        if (!self::$instance) {
            $loader = new \Twig_Loader_Filesystem(array(THEME_PATH));
            self::$instance = new \Twig_Environment($loader, array(
                'debug'=>APP_DEBUG,
                'strict_variables'=>APP_DEBUG,
                'cache' => rtrim(CACHE_PATH,'/\\'),
            ));

        }
        return self::$instance;
    }

    /**
     * 渲染模板输出
     * @param string $templateFile 模板文件名
     * @param array  $parameters   模板变量
     */
    public function fetch($templateFile, $parameters) {
        $twig=self::getInstance();
        $templateFile = substr($templateFile,strlen(THEME_PATH));
        echo $twig->render($templateFile, $parameters);
    }
}