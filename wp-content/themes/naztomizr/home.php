<?php
/*
 * Template Name: Home Page
 * @package Customizr
 * @since Customizr 3.0.12
 */
?>

<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<?php tc__f('rec' , __FILE__ , __FUNCTION__ ); ?>
<div id="main-wrapper" class="container">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>

    <div class="container" role="main">
        <div class="row">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>

                <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

                <div class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">

                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>

                        <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>
                            <article <?php tc__f('__article_selectors') ?>>
                                <?php do_action( '__loop' ); ?>
                            </article>
                        <?php endif; ?>

                        <?php if ( have_posts() && !is_404() ) : ?>
                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                            	<?php /* CATEGORIES FOR ISOTOPE */?>
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

                                <?php the_post(); ?>
                                <article <?php tc__f('__article_selectors') ?>>
                                    <?php
                                        do_action( '__loop' );
                                    ?>
                                </article>
                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

        	<?php wp_reset_query(); ?>

        	<?php do_action( '__after_article_container'); ##hook of left sidebar?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>