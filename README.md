介绍
========

ThinkPHP3.2 Twig模板引擎

安装
------

```
composer require snowair/think-twig:dev-master
```

使用
----

修改配置文件

```
'TMPL_ENGINE_TYPE'=>'Twig',
```

配置Twig
-------

如果需要, 任何时候都可以配置Twig, 推荐在 `app_begin` 阶段配置

示例:

```
$twig = \Think\Template\Driver\Twig::getInstance();
$escaper = new \Twig_Extension_Escaper('html');
$twig->addExtension($escaper);
```