<?php

/*
Plugin Name: TKSocioMenu Widget Plugin
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: rav
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/
/** This file is part of TKSocioMenu Widget Plugin
 *
 *      @desc Initial WP plugin script
 *   @package TKSocioMenu
 *   @version 0.1a
 *    @author Ravil Sarvaritdinov <ra9oaj@gmail.com>
 * @copyright 2017 KCFinder Project
 *   @license http://opensource.org/licenses/GPL-3.0 GPLv3
 *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
 *      @link https://github.com/tehnokom/alfo-tk-socio-menu-plugin
 */

define('TK_SM_ROOT', plugin_dir_path(__FILE__));
define('TK_SM_URL', plugin_dir_url(__FILE__));
define('TK_SM_TEMPLATES_ROOT', TK_SM_ROOT . 'templates/');
define('TK_SM_TEMPLATES_URL', TK_SM_URL . 'templates/');

require_once (TK_SM_ROOT . 'socio_menu.php');

add_action('widgets_init', array('TK_Socio_Menu', 'register_widget'));
