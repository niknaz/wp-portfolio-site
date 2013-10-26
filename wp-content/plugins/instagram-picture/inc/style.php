<?php

add_action('wp_head', 'instagram_picture_style');
add_action('wp_head', 'instagram_picture_jquery');

/*
* action admin panel
*/
add_action('admin_head', 'instagram_picture_style');
add_action('admin_head', 'instagram_picture_style_admin');
add_action('admin_head', 'instagram_picture_jquery');

/*
* Style
*/
function instagram_picture_style() {
	
	########################################################################################################################
	/* 
	*	variable definition
   */
	global $instagram_picture_variable;
	########################################################################################################################
	
	echo '<link rel="stylesheet" id="instagram"  href="'.$instagram_picture_variable["11"].'css/instagram_style.css" type="text/css" media="all" />';
}


/*
* Admin Style
*/
function instagram_picture_style_admin() {
	
	########################################################################################################################
	/* 
	*	variable definition
   */
	global $instagram_picture_variable;
	########################################################################################################################
	
	echo '<link rel="stylesheet" id="instagram"  href="'.$instagram_picture_variable["11"].'css/instagram_style_admin.css" type="text/css" media="all" />';
}

/*
* jQuery
*/
function instagram_picture_jquery() {
	
	########################################################################################################################
	/* 
	*	variable definition
   */
	global $instagram_picture_variable;
	########################################################################################################################
	
	echo '
	<link href="'.$instagram_picture_variable["11"].'css/lightbox.css" rel="stylesheet" />
	<script src="'.$instagram_picture_variable["11"].'lightbox/js/jquery-1.10.2.min.js"></script>
	<script src="'.$instagram_picture_variable["11"].'lightbox/js/lightbox-2.6.min.js"></script>
	';
}
?>