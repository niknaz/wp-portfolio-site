<?php
/** -content-naztomizr_portfolio.php
 *
 * The template for displaying content on the archive page
 * using content-single as a guide
 *
 * @author		Konstantin Obenland & Niknaz Tavakolian
 * @package		naztomizr
 * @since		1.0.0 - 10/26/2013
 */

tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('isotope-item'); ?>>
<a id="post-permalink" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
	<?php tha_entry_top(); ?>
	
	<header class="post-header">

		<?php /* taking out the number... 
		<?php 
		// get post number
		$menu_order = $post->menu_order;
		// since the menu order starts with 0, let's add 1
		$post_number = $menu_order + 1;
		// and then pad it w/ 0's if it's less than 2 digits
		$post_num = sprintf("%02s", $post_number);
		?>
		
		<span class="post-num"><?php echo $post_num; ?></span>
		*/?>
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>		
	</header><!-- .entry-header -->

	<div class="post-featured-image">
		<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail('full');
		} ?>
	</div> <!-- .post-featured-image -->
	
	<?php /* taking out excerpt
	<div class="post-excerpt clearfix">
		<?php 
		if ( has_excerpt() ) {
		 the_excerpt(); 
		 } ?>
	</div><!-- .post-excerpt -->
	*/ ?>

	<div class="post-excerpt-bg">
	</div><!-- .post-excerpt-bg -->
	
	
	<?php tha_entry_bottom(); ?>
</a>
</article><!-- #post-<?php the_ID(); ?> -->
<?php tha_entry_after();


/* End of file content-single.php */
/* Location: ./wp-content/themes/flaviaportugal/partials/content-flavia_portfolio.php */