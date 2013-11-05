<?php
/**
* Navigation action
*
* 
* @package      Customizr
* @subpackage   classes
* @since        3.0
* @author       Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright    Copyright (c) 2013, Nicolas GUILLAUME
* @link         http://themesandco.com/customizr
* @license      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class TC_post_navigation {

    //Access any method or var of the class with classname::$instance -> var or method():
    static $instance;

    function __construct () {

        self::$instance =& $this;

        add_action  ( '__before_main_container'                         , array( $this , 'tc_post_nav' ), 10 );
    }



    /**
     * The template part for displaying nav links
     *
     * @package Customizr
     * @since Customizr 3.0
     */
    function tc_post_nav() {
      
      //we don"t show post navigation for pages
      if( is_page(tc__f ( '__ID' )) ) {
        return;
      }

      tc__f('rec' , __FILE__ , __FUNCTION__, __CLASS__ );
      
      global $wp_query;

      $html_id = 'nav-below';

      ob_start();
      ?>
      <?php if ( is_singular() ) : ?>

        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
          <?php tc__f( 'tip' , __FUNCTION__ , __CLASS__, __FILE__); ?>
            <h3 class="assistive-text"><?php _e( 'Post navigation' , 'customizr' ); ?></h3>

            <ul class="pager">
              <?php if ( get_previous_post() != null ) : ?>
                <li class="previous">
                  <span class="nav-previous"><?php previous_post_link( '%link' , '<span class="meta-nav">' . _x( '&larr;' , 'Previous post link' , 'customizr' ) . '</span> %title' ); ?></span>
                </li>
              <?php endif; ?>
              
                <?php 
                // ADDING a return in the post nav to the relevent PAGE of posts ?>
			    <li class="return">
			  	  <span class="nav-return">
				  	  <?php if ( is_singular( 'naztomizr_portfolio' )) {
					  	   $page = get_page_by_title( 'home' ); 
					  	   } 
					  	   else {
						  	   $page = get_page_by_title( 'news' );
					  	   } ?>
				  	   <a href="<?php echo get_page_link($page->ID); ?>"><span class="meta-nav">&#9547; </span>Back</span></a>
			  	</li>

              <?php if ( get_next_post() != null ) : ?>
                <li class="next">
                  <span class="nav-next"><?php next_post_link( '%link' , '%title <span class="meta-nav">' . _x( '&rarr;' , 'Next post link' , 'customizr' ) . '</span>' ); ?></span>
                </li>
              <?php endif; ?>
            </ul>

        </nav><!-- #<?php echo $html_id; ?> .navigation -->

      <?php //<hr class="featurette-divider"> ?>

      <?php elseif ( $wp_query->max_num_pages > 1 && !is_404() && !tc__f( '__is_home_empty') ) : ?>

        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
          <?php tc__f( 'tip' , __FUNCTION__ , __CLASS__, __FILE__); ?>
          <h3 class="assistive-text"><?php _e( 'Post navigation' , 'customizr' ); ?></h3>

            <ul class="pager">

              <?php if(get_next_posts_link() != null) : ?>

                <li class="previous">
                  <span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts' , 'customizr' ) ); ?></span>
                </li>

              <?php endif; ?>

              <?php if(get_previous_posts_link() != null) : ?>

                <li class="next">
                  <span class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>' , 'customizr' ) ); ?></span>
                </li>

              <?php endif; ?>

            </ul>
            
        </nav><!-- #<?php echo $html_id; ?> .navigation -->

      <?php endif; ?>

      <?php
      $html = ob_get_contents();
      ob_end_clean();
      echo apply_filters( 'tc_post_nav' , $html );
    }

}//end of class
