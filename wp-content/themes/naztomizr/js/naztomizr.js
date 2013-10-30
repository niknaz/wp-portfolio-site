/**
  * Some admin scripts
  *
  * @package Naztomizr
  * @since Naztomizr 1.0
  */
  
// Save us from the WP force type
var $j = jQuery;

$j(function(){
////////// begin sitewide functions /////////////////

/**																						*
  *-------------------------------------------------------------------------------------*
  * 								ISOTOPE FRONT PAGE	  								*
  *	----------------------------------------------------------------------------------- *
  *						http://isotope.metafizzy.co I bow to you. 						*
  *-------------------------------------------------------------------------------------*/

// first let's wrap our function to run only on the home page
if($j('body.home').length > 0){
	
	//let's first get rid of the links in the secondary menu
	$j('#menu-portfolio-menu li a').attr('href', '#');
	
	//now let's engage isotope
	$j('#isotope').isotope({
		// options
		itemSelector : '.naztomizr_portfolio',
		layoutMode   : 'masonry'
	})
	
} // end isotope if statement


	
////////// end sitewide functions //////////////////
});
