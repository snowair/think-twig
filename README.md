介绍
========

ThinkPHP3.2 Twig模板引擎

安装
------

[composer中文文档](http://www.kancloud.cn/thinkphp/composer)

```
composer require snowair/think-twig:dev-master
```

引擎配置
----

    /* Twig模板引擎设置 */
    'TMPL_ENGINE_TYPE'      =>  'Twig',      // 设置为Twig启用twig引擎
    'TMPL_TEMPLATE_SUFFIX'  =>  '.html',     // 设置模板后缀, 可自由设置
    'TMPL_FILE_DEPR'        =>  '/',         // 模板文件CONTROLLER_NAME与ACTION_NAME之间的分割符


做完上面的配置, twig就生效了:

```
<!-- 模板 -->
{{var}}
```

```
// 控制器aciton
    ...
    $this->assign('var','hello world');
    $this->display(); // or `echo $this->fetch();`
```

* 注意: Twig不支持控制器的 show 方法.


跳转页面配置
-------

**无论引擎配置如何, Controller的error/success方法的模板始终采用think引擎渲染.**

如果您确实需要使用twig引擎自定义这两种页面的模板, 只需要使用 `TMPL_ACTION_ERROR`和`TMPL_ACTION_SUCESS`配置指定模板文件的位置,并将模板文件的后缀名改为`twig`即可.

    'TMPL_ACTION_ERROR'     =>  THINK_PATH.'Tpl/dispatch_jump.twig', // 使用twig渲染错误页面
    'TMPL_ACTION_SUCCESS'   =>  THINK_PATH.'Tpl/dispatch_jump.twig', // 使用twig渲染成功页面

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
