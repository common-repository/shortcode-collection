<?php
/*
Plugin Name: Shortcode Collection
Plugin URI: http://agnelwaghela.bammz.net/shortcode-collection/
Description: Add a list of a very useful shortcodes to make your blog faster. For more details see the <a href="http://agnelwaghela.bammz.net/shortcode-collection/">Documentation</a> | <a href="admin.php?page=shortcode-collection/sc_collection.php">Settings</a>
Version: 1.4
Author: Agnel Waghela
Author URI: http://agnelwaghela.bammz.net/
*/

/*  Copyright 2008  Agnel Waghela  (email : agnelwaghela[at]gmail[dot]com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

define ('SCC_FULL',ABSPATH."wp-content/plugins/shortcode-collection/");
define ('SCC',get_bloginfo('wpurl')."/wp-content/plugins/shortcode-collection/");

function scc_ro($i)
{
       require_once(SCC_FULL.$i.".php"); 
}

scc_ro('db');
scc_ro('settings_tabs');
scc_ro('options');
scc_ro('register');

/*WP Hooks*/
add_action('admin_menu', 'scc_add_pages');
add_action('admin_head', 'scc_style');
add_action('wp_head', 'scc_style');
add_action('admin_head', 'scc_js');
add_action('wp_head', 'scc_js');

/*add pages
 *<?php add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
 *<?php add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
 */
 function scc_add_pages() 
{	 
	if (current_user_can('level_10')) 
	{
	      add_menu_page('Shortcode Collection', 'SC Collection', 8, __FILE__, 'scc_dash', SCC."images/menu.png"); 
	      add_submenu_page(__FILE__, 'Settings', 'Settings', 8, 'scc_settings', 'scc_options');
		  /*add_submenu_page(__FILE__, 'Style', 'Style', 8, 'scc_editCSS', 'scc_to_editcss');*/
	}
}

function scc_dash() {
	
	scc_ro('dash');
}

/*load the stylesheet*/
function scc_style()
{
	if(isset($_GET['page']) && ($_GET['page'] == 'shortcode-collection/sc_collection.php' || $_GET['page'] == 'scc_settings')) {
		echo "<link rel=stylesheet href='".SCC."style.css' type='text/css' media='all'>
			  <link rel=stylesheet href='".SCC."js/jquery.tzCheckbox.css' type='text/css' media='all'>";
	}
}

/*load the js*/
function scc_js() {
	/*<?php wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );*/
	if(isset($_GET['page']) && ($_GET['page'] == 'shortcode-collection/sc_collection.php' || $_GET['page'] == 'scc_settings')) {
	echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
		  <script src='".SCC."js/jquery.tzCheckbox.js'></script>
		  <script src='".SCC."js/script.js'></script>
		  <script src='".SCC."js/bootstrap-twipsy.js'></script>
		  <script src='".SCC."js/bootstrap-popover.js'></script>";
	}
}

/*/<?php register_activation_hook( $file, $function );*/
register_activation_hook(__FILE__, 'scc_add_options');

/*<?php register_deactivation_hook($file, $function);*/
register_deactivation_hook(__FILE__, 'scc_delete_options');