<?php

namespace Think\Template\Driver;

use Think\Think;
use Think\View;

/**
 * Twig模板引擎驱动
 */
class Twig {

    static protected $instance;

    static public function getInstance()
    {
        if (!self::$instance) {
            $loader = new \Twig_Loader_Filesystem(array_filter(array(THEME_PATH)));
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
        $view = Think::instance('Think\\View');
        $error_tpl   = $view->parseTemplate(C( 'TMPL_ACTION_ERROR' ));
        $success_tpl = $view->parseTemplate(C( 'TMPL_ACTION_SUCcESS' ));
        if ($error_tpl===$templateFile || $success_tpl===$templateFile ) {
            if (pathinfo($templateFile,PATHINFO_EXTENSION)!=='twig') {
                $tpl = Think::instance('Think\\Template');
                echo $tpl->fetch($templateFile,$parameters);
                return;
            }
        }
        $templateFile = substr($templateFile,strlen(THEME_PATH));
        $twig=self::getInstance();
        echo $twig->render($templateFile, $parameters);
    }
}
