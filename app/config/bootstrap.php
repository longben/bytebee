<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php
 *
 * This is an application wide file to load any function that is not used within a class
 * define. You can also use this to include or require any files in your application.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * App::build(array(
 *     'plugins' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
 *     'models' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
 *     'views' => array('/full/path/to/views/', '/next/full/path/to/views/'),
 *     'controllers' => array(/full/path/to/controllers/', '/next/full/path/to/controllers/'),
 *     'datasources' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
 *     'behaviors' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
 *     'components' => array('/full/path/to/components/', '/next/full/path/to/components/'),
 *     'helpers' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
 *     'vendors' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
 *     'shells' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
 *     'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
 * ));
 *
 */

/**
 * As of 1.3, additional rules for the inflector are added below
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */
define('SMALL_IMG_PREFIX', 's_'); //微缩图前缀


//系统角色
define('ROLE_ADMIN', 0); //系统管理员
define('ROLE_WEBSITE_ADMIN',1);//网站管理员
define('ROLE_DEFAULT',2);//默认角色

define('MEMBER_ADMIN', 1);  //管理员

date_default_timezone_set("Asia/Chongqing");  //需要用到日期，强制设置时区
   
/**
 * Cache configuration
 */
    $cacheConfig = array(
        'duration' => '+1 hour',
        'path' => CACHE.'queries',
        'engine' => 'File',
    );   
   
    // models
   Cache::config('setting_write_configuration', $cacheConfig);   
   
   /**
 * Settings
 */
    require_once APP.'vendors'.DS.'spyc'.DS.'spyc.php';
    if (file_exists(CONFIGS.'settings.yml')) {
        $settings = Spyc::YAMLLoad(file_get_contents(CONFIGS.'settings.yml'));
        foreach ($settings AS $settingKey => $settingValue) {
            Configure::write($settingKey, $settingValue);
        }
    }

//include_once APP.'config'.DS.'sinobee_bootstrap.php';
//include_once APP.'config'.DS.'eojia_bootstrap.php';
//include_once APP.'plugins'.DS.'slypzx'.DS.'config'.DS.'slypzx_bootstrap.php';

//include_once APP.'plugins'.DS.'cdyht'.DS.'config'.DS.'bootstrap.php';

?>