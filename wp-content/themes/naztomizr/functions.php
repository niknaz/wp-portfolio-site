<?php 
/*
 * CUSTOM FUNCTIONS FOR THE NAZTOMIZR THEME
 */


/**
  * Adding the jQueries
  */
 function load_naztomizr_scripts() {

/* let's enqueue the libraries */
	wp_enqueue_script(
	'easing',
	get_stylesheet_directory_uri() . "/js/jquery.easing.1.3.js",
	array('jquery'),
	'1.3',
	true /* in footer */
	);
		
	wp_enqueue_script(
	'isotope', 
	get_stylesheet_directory_uri() . '/js/jquery.isotope.min.js',
	array('jquery'),
	'1.5.25',
	true
	);

	wp_enqueue_script(
	'waypoints', 
	get_stylesheet_directory_uri() . '/js/waypoints.min.js',
	array('jquery'),
	'2.0.3',
	true
	);
	
	wp_enqueue_script(
	'waypoints-sticky', 
	get_stylesheet_directory_uri() . '/js/waypoints-sticky.min.js', 
	array('jquery'), 
	'1.0', 
	true
	);

	wp_enqueue_script(
	'hoverdir', 
	get_stylesheet_directory_uri() . '/js/jquery.hoverdir.js', 
	array('jquery'), 
	'1.1.1', 
	true
	);

	wp_enqueue_script(
	'modernizr.custom', 
	get_stylesheet_directory_uri() . '/js/modernizr.custom.97074.js', 
	array('jquery'), 
	'2.6.2', 
	true
	);
	
/* and enqueue the scripts */
	wp_enqueue_script(
	'naztomizr',
	get_stylesheet_directory_uri() . '/js/naztomizr.js',
	array( 'jquery' )
	);		
}

add_action( 'wp_enqueue_scripts', 'load_naztomizr_scripts', 11);  




/**
  * Adding custom taxonomies for Portfolio Category
  */
add_action( 'init', 'naztomizr_create_custom_tax' );

function naztomizr_create_custom_tax() {
	register_taxonomy('portfolio_category', 'naztomizr_portfolio', array( //reference theme name to avoid conflict
		// Hierarchical taxonomy - false for tag style, true for category style
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Portfolio Categories', 'taxonomy general name' ),
			'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Portfolio Categories' ),
			'all_items' => __( 'All Portfolio Categories' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category' ),
			'update_item' => __( 'Update Portfolio Category' ),
			'add_new_item' => __( 'Add New Portfolio Category' ),
			'new_item_name' => __( 'New Portfolio Category Name' ),
			'menu_name' => __( 'Portfolio Categories' ),
		),
		'query_var' => true,
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'portfolio-category', // This controls the base slug that will display before each term
			'with_front' => false // Don't display the category base before "/locations/"
		),
	));
}

/**
  * Initializing multiple post types
  * Portfolio Posts and Press Posts
  * (note: register_post_type() must be before the admin_menu 
  * and after the after_setup_theme action hooks)
  */
add_action( 'init', 'naztomizr_create_post_types' );

function naztomizr_create_post_types(){
	register_post_type( 'naztomizr_portfolio', //reference theme name to avoid conflict
		array(
			'labels' => array(
				'name' => __( 'Portfolio Posts' ),
				'singular_name' => __( 'Portfolio Post' ),
				'all_items' => __( 'All Portfolio Posts' )
				),
			'description' => __('Individual portfolio item for Naztomizr Theme'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5, //right after Post
			'map_meta_cap' => true,
			'rewrite' => array( 'slug' => 'portfolio' ), //rewrite for URL
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ), //maybe add excerpt
			'taxonomies' => array( 'post_tag', 'portfolio_category' ),
			'has_archive' => true,
		)
	);

//connects our custom taxonomy to this post type
register_taxonomy_for_object_type( 'portfolio_category', 'naztomizr_portfolio');
}

/**
  * Changing the word Post in the dashboard to Blog Post for clarity
  * http://wp.tutsplus.com/tutorials/creative-coding/customizing-your-wordpress-admin/
  */
function edit_admin_menus() {
	global $menu;
	
	$menu[5][0] = 'Blog Posts'; // Change Posts to Recipes
}
add_action( 'admin_menu', 'edit_admin_menus' );



/*
 * Registering a menu for the portfolio content type categories 
 */
function register_other_menus() {
	register_nav_menu( 'portfolio_secondary', __( 'Portfolio Secondary Menu' ));
}
add_action( 'init', 'register_other_menus' );

/* Moving the image slider */
//we hook the code on the wp_head hook, this way it will be executed before any html rendering.
add_action ( 'wp_head' , 'move_my_slider');
function move_my_slider() {
	//we unhook the slider
	remove_action( '__after_header' , array( TC_slider::$instance , 'tc_slider_display' ));

	//we re-hook the slider. Check the priority here : set to 0 to be the first in the list of different actions hooked to this hook 
	add_action( '__before_main_container' , array( TC_slider::$instance , 'tc_slider_display' ), 11);
}
?>