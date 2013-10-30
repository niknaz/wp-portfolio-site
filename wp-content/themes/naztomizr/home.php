<?php
/*
Template Name: Home Page 
*/
?>
<?php do_action( '__before_main_wrapper' ); ##hooks the header with get_header ?>
<?php tc__f('rec' , __FILE__ , __FUNCTION__ ); ?>
<div id="main-wrapper" class="container">
    <?php /* do_action( '__before_main_container' ); ##hooks the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! naz: don't need this hook (found in class-cntent-featured_pages.php) */?>
    <div class="container" role="main">
        <div class="row">
            <?php do_action( '__sidebar' , 'left' ); ?>
                <div class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                    
                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>
                        
                        <?php
                            global $wp_query;
                            $temp_query = $wp_query; 
                            $args = array( 'post-type' => 'naztomizr_portfolio' ); ##this is where we define the custom post type
                            $wp_query = new WP_query($args);
                            
                            ##do we have posts? If not are we in the no search result case?
                            if ( have_posts() || (is_search() && 0 == $wp_query -> post_count) ) : ?>
                                <?php if ( is_search() && 0 == $wp_query -> post_count ) : ##no search results case ?>
                                    <article <?php tc__f('__article_selectors') ?>>
                                        <?php do_action( '__loop' ); ?>
                                        
                                        <?php $wp_query = $temp_query; ?>
                                    </article>
                                <?php endif; ?>

                                <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                                	
                                	<?php /* let's add our isotope */ ?>
                                    <section id="primary" class="full-width isotope-primary">
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
                                        ##we don't want to display more than one post if 404!
                                        if ( is_404() )
                                            break;
                                        ?>
                                    </article>
                                    
                                    </section> <!-- .isotope-primary -->
                                <?php endwhile; ?>

                            <?php endif; ##end if have posts ?>

                    <?php do_action ('__after_loop');##hooks the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->
            <?php do_action( '__sidebar' , 'right' ); ?>
        </div><!--.row -->
    </div><!-- .container role: main -->
    <?php do_action( '__after_main_container' ); ?>
</div><!--#main-wrapper"-->
<?php do_action( '__after_main_wrapper' );##hooks the footer with get_get_footer ?>


*************

