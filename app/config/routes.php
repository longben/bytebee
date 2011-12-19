<?php

//允许你使用RequestHandler组件检测你的内容类型，主要用于XML文件解析
Router::parseExtensions('xml', 'json');


// Router::connect('/admin/:controller/:action/*', array(
    // 'action' => null, 'prefix' => 'admin', 'admin' => true
// )); 

// if ($plugins = Configure::listObjects('plugin')) {
    // $pluginMatch = implode('|', array_map(array('Inflector', 'underscore'), $plugins));
    // Router::connect(
        // "/admin/:plugin/:controller/:action/*",
        // array('action' => null, 'prefix' => 'admin', 'admin' => true),
        // array('plugin' => $pluginMatch)
    // );
// }

Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
?>