<?php
/** archive-naztomizr_portfolio.php
 *
 * The template for displaying the Portfolio as an Isotope page.
 *
 *
 * @author		Konstantin Obenland & Niknaz Tavakolian
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */

get_header(); ?>

<section id="primary" class="full-width isotope-primary">

	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top();
		
		if ( have_posts() ) : ?>

			<header class="isotope-header">
				<nav id="isotope-nav" class="secondary-nav span10 offset2" data-option-key="filter">
				<?php  
					/* let's get the categories here 
					 * thanks to here: 
					 * http://www.paulund.co.uk/display-categories-of-a-custom-post-type */
					 
				$customPostTaxonomies = get_object_taxonomies('naztomizr_portfolio');

					if(count($customPostTaxonomies) > 0)
					{
					     foreach($customPostTaxonomies as $tax)
					     {
						     $args = array(
					         	  'orderby' => 'name',
						          'show_count' => 0,
					        	  'pad_counts' => 0,
						          'hierarchical' => 1,
					        	  'taxonomy' => $tax,
					        	  'title_li' => ''
					        	);
					
						     wp_list_categories( $args );
					     }
					} ?>
				</nav><!-- .secondary-nav -->
			</header><!-- .isotope-header -->
			
			<?php /* color band */ ?>
			<div id="container" class="full-width clearfix">
				<div id="iso-container">
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( '/parts/content', get_post_type() );
			}
			the_bootstrap_content_nav();
		else :
			get_template_part( '/parts/content', 'not-found' );
		endif; ?>
			
				</div><!-- #iso-container -->
			</div><!-- #container -->

		<?php 
		tha_content_bottom(); ?>
	</div><!-- #content -->
	<?php tha_content_after(); ?>
</section><!-- #primary -->

<?php
get_sidebar();
get_footer();


/* End of file archive.php */
/* Location: ./wp-content/themes/flaviaportugal/archive.php */