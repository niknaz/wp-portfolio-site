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
	<?php ##Adding a registered menu ?>
	<section id="options" class="isotope-header span12">
	<?php wp_nav_menu( array(
		'theme_location' 	=> 'portfolio_secondary',
		'container'			=> 'nav',
		'container_class'	=> 'isotope-menu, portfolio-secondary',
		'menu_class'		=> 'nav nav-tabs',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s"><li id="menu-desc">(filter by):</li>%3$s</ul>'
	 )); ?>
	</section><!-- .isotope-header -->

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
                        
                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                            <section class="isotope-container full-width">
                                <?php the_post(); ?>
                                <article <?php tc__f('__portfolio_selectors') ?>>
                                    <?php
                                        do_action( '__loop_portfolio' );
                                    ?>
                                </article>
                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>
                            </section><!-- .isotope-container -->

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

        	<?php wp_reset_query(); ?>

        	<?php do_action( '__after_article_container'); ##hook of left sidebar?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>