<?php

add_filter('mce_external_plugins', 'scc_register');
if(get_option('scc_dashboard_widget') == 1) {
	add_action('wp_dashboard_setup', 'scc_active_shortcodes');	
}
if(get_option('scc_posteditor_metabox') == 1) {
	add_action( 'add_meta_boxes', 'scc_sctive_shortcodes_add_custom_box' );
}

function scc_active_shortcodes() {
	
	wp_add_dashboard_widget('scc_active_shortcodes', 'Active shortcodes Reference By Shortcode Collection', 'scc_active_shortcodes_dashboard_widget');	
}

function scc_active_shortcodes_dashboard_widget() {
	
	if( current_user_can('switch_themes'))
	{
		global $shortcode_tags;
		print("<h3>[Shortcodes]</h3>");
		print("<ul>");
		foreach($shortcode_tags as $key => $value) {	
			print("<li><h4>[$key]</h4></li>");
		}
		
		print("</ul>");;
	}
	else {
		print('Only Blog Admins can see this section!!:P');
	}
}

function scc_sctive_shortcodes_add_custom_box() {
    add_meta_box( 
        'scc_sctive_shortcodes_sectionid',
        __( 'Active Shortcodes', 'scc_sctive_shortcodes_textdomain' ),
        'scc_sctive_shortcodes_inner_custom_box',
        'post' 
    );
    add_meta_box(
        'scc_sctive_shortcodes_sectionid',
        __( 'Active Shortcodes', 'scc_sctive_shortcodes_textdomain' ), 
        'scc_sctive_shortcodes_inner_custom_box',
        'page'
    );
}

function scc_sctive_shortcodes_inner_custom_box( $post ) {

  if( current_user_can('switch_themes'))
	{
		global $shortcode_tags;
		print("<h3>[Shortcodes]</h3>");
		print("<ul>");
		foreach($shortcode_tags as $key => $value) {	
			print("<li><h4>[$key]</h4></li>");
		}
		
		print("</ul>");
	}
	else {
		print('Only Blog Admins can see this section!!:P');
	}
}

function scc_register($plugin_array) {

	if(get_option('scc_member') == 1) {
		$url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/shortcode-collection/tinyMCEbuttons/member/editor_plugin.js";
		$plugin_array['scc_member'] = $url;
		add_filter('mce_buttons', 'scc_add_member_button', 0);
    }
	if(get_option('scc_embedpdf') == 1) {
		$url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/shortcode-collection/tinyMCEbuttons/embedpdf/editor_plugin.js";
		$plugin_array['scc_embedpdf'] = $url;
		add_filter('mce_buttons', 'scc_add_embedpdf_button', 0);
    }
	if(get_option('scc_note') == 1) {
		$url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/shortcode-collection/tinyMCEbuttons/note/editor_plugin.js";
		$plugin_array['scc_note'] = $url;
		add_filter('mce_buttons', 'scc_add_note_button', 0);
    }
	if(get_option('scc_pirate') == 1) {
		$url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/shortcode-collection/tinyMCEbuttons/pirate/editor_plugin.js";
		$plugin_array['scc_pirate'] = $url;
		add_filter('mce_buttons', 'scc_add_pirate_button', 0);
	}
	if(get_option('scc_youtube') == 1) {
		$url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/shortcode-collection/tinyMCEbuttons/youtube/editor_plugin.js";
		$plugin_array['scc_youtube'] = $url;
		add_filter('mce_buttons', 'scc_add_youtube_button', 0);
	}
	if(get_option('scc_signoff') == 1) {
		$url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/shortcode-collection/tinyMCEbuttons/signoff/editor_plugin.js";
		$plugin_array['scc_signoff'] = $url;
		add_filter('mce_buttons', 'scc_add_signoff_button', 0);
	}
	
	return $plugin_array;
}

function scc_add_member_button($buttons) {
	array_push($buttons, "separator", "scc_member");
	return $buttons;
}

function scc_add_embedpdf_button($buttons) {
	array_push($buttons, "separator", "scc_embedpdf");
	return $buttons;
}

function scc_add_note_button($buttons) {
	array_push($buttons, "separator", "scc_note");
	return $buttons;
}

function scc_add_pirate_button($buttons) {
	array_push($buttons, "separator", "scc_pirate");
	return $buttons;
}

function scc_add_youtube_button($buttons) {
	array_push($buttons, "separator", "scc_youtube");
	return $buttons;
}

function scc_add_signoff_button($buttons) {
	array_push($buttons, "separator", "scc_signoff");
	return $buttons;
}

add_shortcode('member', 'scc_member_function');
add_shortcode('embedpdf', 'scc_embedpdf_function');
add_shortcode('note', 'scc_note_function');
add_shortcode('pirate', 'scc_pirate_function');
add_shortcode('youtube', 'scc_youtube_function');
add_shortcode('signoff', 'scc_signoff_function');

function scc_member_function($attr, $content = null) {
	if(is_user_logged_in() && !is_null($content) && !is_feed())
		return do_shortcode($content);
	return '';
}

function scc_embedpdf_function ( $attr, $url ) {
	    return '<iframe src="http://docs.google.com/viewer?url=' . $url . '&embedded=true" style="width:' .$attr['width']. '; height:' .$attr['height']. ';" frameborder="0">Your browser should support iFrame to view this PDF document</iframe>';
}

function scc_note_function ( $attr, $content = null ) {
	if ( current_user_can( 'publish_posts' ) )
		return '<div class="note">'.$content.'</div>';
	return '';	
}

function scc_pirate_function ( $attr, $content = null ) {
	 
      $patterns = array(
        '%\bmy\b%' => 'me',
        '%\bboss\b%' => 'admiral',
        '%\bmanager\b%' => 'admiral',
        '%\b[Cc]aptain\b%' => "Cap'n",
        '%\bmyself\b%' => 'meself',
        '%\byour\b%' => 'yer',
        '%\byou\b%' => 'ye',
        '%\bfriend\b%' => 'matey',
        '%\bfriends\b%' => 'maties',
        '%\bco[-]?worker\b%' => 'shipmate',
        '%\bco[-]?workers\b%' => 'shipmates',
        '%\bpeople\b%' => 'scallywags',
        '%\bearlier\b%' => 'afore',
        '%\bold\b%' => 'auld',
        '%\bthe\b%' => "th'",
        '%\bof\b%' =>  "o'",
        "%\bdon't\b%" => "dern't",
        '%\bdo not\b%' => "dern't",
        '%\bnever\b%' => "no nay ne'er",
        '%\bever\b%' => "e'er",
        '%\bover\b%' => "o'er",
        '%\bYes\b%' => 'Aye',
        '%\bNo\b%' => 'Nay',
        '%\bYeah\b%' => 'Aye',
        '%\byeah\b%' => 'aye',
        '%\bare\b%' => 'be',
        '%\bDrupalists\b%' => 'Bucaneers',
        '%\bthere\b%' => 'thar',
        '%b\bnot\b%' => 'nay',
        '%\bdesign\b%' => 'bounty',
        '%\bonline\b%' => 'on the plank',
        '/and\b/' => "an'",
        '/ious\b/' => "i'us",
        "%\bdon't know\b%" => "dinna",
        "%\bdidn't know\b%" => "did nay know",
        "%\bhadn't\b%" => "ha'nae",
        "%\bdidn't\b%"=>  "di'nae",
        "%\bwasn't\b%" => "weren't",
        "%\bhaven't\b%" => "ha'nae",
        '%\bfor\b%' => 'fer',
        '%\bbetween\b%' => 'betwixt',
        '%\baround\b%' => "aroun'",
        '%\bto\b%' => "t'",
        "%\bit's\b%" => "'tis",
        '%\bwoman\b%' => 'wench',
        '%\bwomen\b%' => 'wenches',
        '%\blady\b%' => 'wench',
        '%\bwife\b%' => 'lady',
        '%\bgirl\b%' => 'lass',
        '%\bgirls\b%' => 'lassies',
        '%\bguy\b%' => 'lubber',
        '%\bman\b%' => 'lubber',
        '%\bfellow\b%' => 'lubber',
        '%\bdude\b%' => 'lubber',
        '%\bboy\b%' => 'lad',
        '%\bboys\b%' => 'laddies',
        '%\bchildren\b%' => 'little sandcrabs',
        '%\bkids\b%' => 'minnows',
        '%\bhim\b%' => 'that scurvey dog',
        '%\bher\b%' => 'that comely wench',
        '%\bhim\.\b%' => 'that drunken sailor',
        '%\bHe\b%' => 'The ornery cuss',
        '%\bShe\b%' => 'The winsome lass',
        "%\bhe's\b%" => 'he be',
        "%\bshe's\b%" => 'she be',
        '%\bwas\b%' => "were bein'",
        '%\bHey\b%' => 'Avast',
        '%\bher\.\b%' => 'that lovely lass',
        '%\bfood\b%' => 'chow',
        '%\bmoney\b%' => 'dubloons',
        '%\bdollars\b%' => 'pieces of eight',
        '%\bcents\b%' => 'shillings',
        '%\broad\b%' => 'sea',
        '%\broads\b%' => 'seas',
        '%\bstreet\b%' => 'river',
        '%\bstreets\b%' => 'rivers',
        '%\bhighway\b%' => 'ocean',
        '%\bhighways\b%' => 'oceans',
        '%\binterstate\b%' => 'high sea',
        '%\bprobably\b%' => 'likely',
        '%\bidea\b%' => 'notion',
        '%\bcar\b%' => 'boat',
        '%\bcars\b%' => 'boats',
        '%\btruck\b%' => 'schooner',
        '%\btrucks\b%' => 'schooners',
        '%\bSUV\b%' => 'ship',
        '%\bairplane\b%' => 'flying machine',
        '%\bjet\b%' => 'flying machine',
        '%\bmachine\b%' => 'contraption',
        '%\bdriving\b%' => 'sailing',
        '%\bunderstand\b%' => 'reckon',
        '%\bdrive\b%' => 'sail',
        '%\bdied\b%' => 'snuffed it',
        '/ing\b/' => "in'",
        '/ings\b/' => "in's",
      );
      foreach ($patterns as $pattern_search => $pattern_replace) {
        $content = preg_replace($pattern_search, $pattern_replace, $content);
      }
      return do_shortcode($content);
}

function scc_youtube_function ( $attr ) {
	extract(shortcode_atts(array(
		"value" => 'http://',
		"width" => '475',
		"height" => '350',
		"name"=> 'movie',
		"allowFullScreen" => 'true',
		"allowScriptAccess"=>'always',
	), $attr));
	return '<object style="height: '.$height.'px; width: '.$width.'px"><param name="'.$name.'" value="'.$value.'"><param name="allowFullScreen" value="'.$allowFullScreen.'"></param><param name="allowScriptAccess" value="'.$allowScriptAccess.'"></param><embed src="'.$value.'" type="application/x-shockwave-flash" allowfullscreen="'.$allowFullScreen.'" allowScriptAccess="'.$allowScriptAccess.'" width="'.$width.'" height="'.$height.'"></embed></object>';
}

function scc_signoff_function ( $attr, $content = null ) {
	if ( current_user_can( 'publish_posts' ))
		return $content.'<br />'.get_option('scc_signoff_content');
	return '';
}