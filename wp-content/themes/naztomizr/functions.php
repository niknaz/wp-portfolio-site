<?php 

/**
  * Adding all the jQueries
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
	
/* and enqueue the scripts */
	wp_enqueue_script(
	'naztomizr',
	get_stylesheet_directory_uri() . '/js/naztomizr.js',
	array( 'jquery' )
	);		
}

add_action( 'wp_enqueue_scripts', 'load_naztomizr_scripts', 11);  

/**
  * Adding custom taxonomies
  */
add_action( 'init', 'naztomizr_create_custom_tax' );

function naztomizr_create_custom_tax() {
	register_taxonomy('portfolio_category', 'naztomizr_portfolio', array( //reference theme name to avoid conflict
		// Hierarchical taxonomy (like categories)
		'hierarchical' => false,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Portfolio Categories', 'taxonomy general name' ),
			'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Portflio Categories' ),
			'all_items' => __( 'All Portfolio Categories' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category' ),
			'update_item' => __( 'Update Portfolio Category' ),
			'add_new_item' => __( 'Add New Portfolio Category' ),
			'new_item_name' => __( 'New Portfolio Category Name' ),
			'menu_name' => __( 'Portfolio Categories' ),
		),
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
			'description' => __('Individual portfolio item for Thirteen Ilicious Theme'),
			'public' => true,
			'menu_position' => 5, //right after Post
			'map_meta_cap' => true,
			'rewrite' => array( 'slug' => 'portfolio' ), //rewrite for URL
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ), //maybe add excerpt
			'taxonomies' => array( 'portfolio_category' ),
			'has_archive' => true,
		)
	);
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

?>