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


### 错误跳转页面和成功跳转页面

控制器的error/success方法的模板始终采用think引擎渲染.

如果您需要使用twig引擎自定义这两种页面的模板, 只需要使用 `TMPL_ACTION_ERROR`和`TMPL_ACTION_SUCESS`配置指定模板文件的位置,并将模板文件的后缀名改为`twig`即可.

* 注:异常页面模板, 不支持任何模板引擎.

配置Twig
-------

如果需要, 任何时候都可以配置Twig, 推荐在 `app_begin` 阶段配置

示例:

```
$twig = \Think\Template\Driver\Twig::getInstance();
$escaper = new \Twig_Extension_Escaper('html');
$twig->addExtension($escaper);
```