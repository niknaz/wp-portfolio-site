<?php
/*
 *Template Name: Home Page 
 *
 * The template for displaying the Portfolio as an Isotope page
 * Thanks to this: http://wordpress.org/support/topic/how-to-add-a-blog-template-for-customizr?replies=1
 *
 */
?>

<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<?php tc__f('rec' , __FILE__ , __FUNCTION__ ); ?>
<div id="main-wrapper" class="container">

    <div class="container" role="main">
        <div class="row">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>

                <?php query_posts('post_type=naztomizr_portfolio&post_status=publish' ); ?>

                <div class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">

                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>

                        <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>
                            <article <?php tc__f('__article_selectors') ?>>
                                <?php do_action( '__loop' ); ?>
                            </article>
                        <?php endif; ?>

                        <?php if ( have_posts() && !is_404() ) : ?>
                        
                        	<?php ##Adding a custom clickable category filter for isotope. Need to have this hook into the classes... 
                        		  ##until then, this is a solution ?>
                        	<header class="isotope-header span12">
								<nav id="isotope-nav" class="nav span6" data-option-key="filter">
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

                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                                <?php the_post(); ?>
                                <article <?php tc__f('__portfolio_selectors') ?>>
                                    <?php
                                        do_action( '__loop_portfolio' );
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