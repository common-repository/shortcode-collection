<?php

function scc_plugin_options_tabs() {
	
	$scc_plugin_settings_tabs = array();
	$scc_home_key = 'shortcode-collection/sc_collection.php';
	$scc_settings_key = 'scc_settings';
	
	$scc_plugin_settings_tabs[$scc_home_key] = 'Home';
	$scc_plugin_settings_tabs[$scc_settings_key] = 'Settings';
	
	$current_tab = ( isset( $_GET['page'] ) && $_GET['page'] == 'scc_settings' ) ? $scc_settings_key : $scc_home_key;
	
	/*screen_icon(); */
	echo '<div id="icon-options-general" class="icon32"><br></div>';
	echo '<h2 class="nav-tab-wrapper">';
	
	foreach( $scc_plugin_settings_tabs as $tab_key => $tab_caption ) {
		$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
		echo '<a class="nav-tab ' . $active . '" href="admin.php?page=' . $tab_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
	}
	echo '</h2>';
	
}